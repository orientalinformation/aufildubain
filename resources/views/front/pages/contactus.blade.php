@inject('utils', 'App\Services\UtilsService')
@inject("stores",'App\Services\StoresService')

@extends('front/master')

@section('page-class', 'contactus')

@section('head')
    
    <title>{{ !empty($page->meta_title)?$page->meta_title:$page->title }}</title>
    <meta name="description" content="{{ $page->meta_description }}" />
    <meta name="keywords" content="{{ $page->meta_keywords }}" />

    @parent
    <style type="text/css">
        .inspirations #main {
            /*padding-bottom: 390px;*/
            position: relative;
        }
        #frmContact div{
            padding-bottom: 10px;
        }
    </style>
@endsection

@section('content')
    <div class="page-header wave-end">
        <div class="container wow fadeInLeft">
            <div class="text-center">
                <div class="page title h1">
                    <h1>{{ $page->title }}</h1>
                    <span class="filigrane">{{ $page->title }}</span>
                </div>
                <div class="row">
                    <div class="col-md-8 offset-md-2">
                        {!! $utils->replaceTplVar($page->body) !!}
                    </div>
                </div>
            </div>
        </div>
    </div><!-- /page-header -->
    <div class="container page-content">
        <div class="offset-lg-2 col-lg-8">
            <form action="{{route('sendcontact')}}" method="post" id="frmContact">
                <div class="form-group row">
                    <div class="col-md-3">
                        <select name="civility" class="form-control" required>
                            <option value="">{{__('Civilité')}}</option>
                            <option value="Madame">{{__('Madame')}}</option>
                            <option value="Monsieur">{{__('Monsieur')}}</option>
                        </select>
                    </div>
                    <div class="col-md-4">
                        <input type="text" class="form-control" name="name" value="" placeholder="Nom" required>
                    </div>
                    <div class="col-md-5">
                        <input type="text" class="form-control" name="first_name" value="" placeholder="Prénom" required>
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-md-6">
                        <input type="text" class="form-control" name="phone" value="" placeholder="Telephone" required>
                    </div>    
                    <div class="col-md-6">
                        <input type="text" class="form-control" name="address" value="" placeholder="Adresse" required>
                    </div> 
                </div>
                <div class="form-group row">
                    <div class="col-md-6">
                        <input type="text" class="form-control" name="post_code" value="" placeholder="Code postal" required>
                    </div> 
                    <div class="col-md-6">
                        <input type="text" class="form-control" name="city" value="" placeholder="Ville" required>
                        <input type="hidden" name="_token" value="{{csrf_token()}}">
                    </div>                                                   
                </div>
                <div class="form-group row">
                    <div class="col-md-6">
                        <input type="email" class="form-control" name="email" value="" placeholder="Email" required>
                    </div>
                    <div class="col-md-6">
                        <select class="form-control select2" name="zip" id="storeId" required>
                            <option value="">{{__('Choisir votre salle')}}</option>
                            <?php 
                                foreach ($stores->listingByDepartment() as $store) {
                                    // dd($store);
                                    $storeName = 
                                        $store->department_name . ' - '
                                        . $store->name . ' - ' 
                                        . $store->city . ' - '
                                        . $store->zip;
                            ?>
                                <option id="" value="{{ $store->id }}"> {{ $storeName }} </option>
                            <?php         
                                }
                            ?>                      
                        </select> 
                    </div>  
                </div>              
                <div class="form-group row">
                    <div class="col-md-12">
                        <textarea name="message" style="height: 100px;" class="form-control" placeholder="Votre message"></textarea>
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-md-6 col-lg-6" class="form-control">
                        <div class="g-recaptcha" id="rcaptcha" data-sitekey="{{setting('site.api_capcha')}}"></div>
                    </div>
                    <div class="col-md-6 col-lg-6" class="form-control">
                        <button type="submit" onClick="return validateCaptcha();" name="btn_contact" class="btn btn-lg btn-primary col-sm">{{__('VALIDER')}}</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection


@section('scripts')
    @parent
    <script>
        (function () {
            if (window.location.hash.length > 0) {
                var id = window.location.hash.replace('#','');
                $('#storeId').val(id);
            }
            $('select.select2').select2({width: '100%'});
        })();

        function validateCaptcha() 
        {
            var v = grecaptcha.getResponse();
            if(v.length == 0)
            {
                alert('S\'il vous plaît vérifiez que vous êtes un humain');
                return false;
            }
            return true; 
        }
    </script>
    <script src="https://www.google.com/recaptcha/api.js" async defer></script>
@endsection