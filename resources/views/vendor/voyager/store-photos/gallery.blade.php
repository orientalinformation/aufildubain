@inject('utils', 'App\Services\UtilsService')

<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}"/>

        <!-- Google Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,700" rel="stylesheet">

        <!-- Favicon -->
        <link rel="shortcut icon" href="{{ url('/images/favicon.png') }}" type="image/x-icon">
       
        <!-- App CSS -->
        <link rel="stylesheet" href="{{ voyager_asset('css/app.css') }}">

        <!-- Few Dynamic Styles -->
        <style type="text/css">
            .voyager .side-menu .navbar-header {
                background:{{ config('voyager.primary_color','#22A7F0') }};
                border-color:{{ config('voyager.primary_color','#22A7F0') }};
            }
            .widget .btn-primary{
                border-color:{{ config('voyager.primary_color','#22A7F0') }};
            }
            .widget .btn-primary:focus, .widget .btn-primary:hover, .widget .btn-primary:active, .widget .btn-primary.active, .widget .btn-primary:active:focus{
                background:{{ config('voyager.primary_color','#22A7F0') }};
            }
            .voyager .breadcrumb a{
                color:{{ config('voyager.primary_color','#22A7F0') }};
            }
        </style>

        @if(!empty(config('voyager.additional_css')))<!-- Additional CSS -->
            @foreach(config('voyager.additional_css') as $css)<link rel="stylesheet" type="text/css" href="{{ asset($css) }}">@endforeach
        @endif
    </head>

    <body class="voyager @if(isset($dataType) && isset($dataType->slug)){{ $dataType->slug }}@endif">

    <div id="voyager-loader">
        <?php $admin_loader_img = Voyager::setting('admin.loader', ''); ?>
        @if($admin_loader_img == '')
            <img src="{{ voyager_asset('images/logo-icon.png') }}" alt="Voyager Loader">
        @else
            <img src="{{ Voyager::image($admin_loader_img) }}" alt="Voyager Loader">
        @endif
    </div>

    <?php
    $user_avatar = Voyager::image(Auth::user()->avatar);
    if ((substr(Auth::user()->avatar, 0, 7) == 'http://') || (substr(Auth::user()->avatar, 0, 8) == 'https://')) {
        $user_avatar = Auth::user()->avatar;
    }
    ?>

    <div class="app-container">
        <div class="fadetoblack visible-xs"></div>
        <div class="row content-container">
            <div class="container-fluid">
                <!-- Main Content -->
                <div id="voyager-notifications"></div>

                <!-- html Content -->
                @include('voyager::alerts')
                <div class="row aufi-gallery">

                    @foreach($dataTypeContent as $data)

                    
                        <?php 
                            $size = 0;

                            if(!filter_var($data->images, FILTER_VALIDATE_URL)) {

                                $fileExists =Storage::disk(config('voyager.storage.disk'))->exists($data->images);
                                $imgUrl = Voyager::image($data->images);

                                if ($fileExists)
                                    $size =  Storage::disk(config('voyager.storage.disk'))->size($data->images);
                                else 
                                    $imgUrl = voyager_asset('images/no-photo.jpg');
                                
                            } else {
                                $imgUrl = $data->images;
                            }

                        ?>
            
                        <div class="col-sm-6 col-md-3"> 
                            <div class="panel widget bgimage aufi-gallery-item" style="margin-bottom:0;overflow:hidden;background-image:url('{{ $imgUrl }}');">
                                <div class="dimmer"></div>
                                <div class="panel-content">
                                    <h4> {{ $data->title }}</h4>
                                </div>
                            </div>
                            <div class="aufi-panel-button">
                                    <span class="aufi-span-size">
                                        {{ $utils->human_filesize($size) }}
                                    </span>
                                    @can('delete', $data)
                                        <a href="javascript:;" title="{{ __('voyager.generic.delete') }}" class="btn btn-sm btn-danger aufi-a-trash delete" data-id="{{ $data->{$data->getKeyName()} }}" id="delete-{{ $data->{$data->getKeyName()} }}">
                                            <i class="voyager-trash"></i> 
                                        </a>
                                    @endcan
                                    @can('edit', $data)
                                        <a title="{{ __('voyager.generic.edit') }}" class="btn btn-sm
                                            btn-primary aufi-a-pencil edit" data-id="{{ $data->{$data->getKeyName()} }}"  data-title="{{ $data->title }}"
                                            data-order="{{ $data->order }}">
                                            <span class="fas fa-pencil-alt"> </span>
                                        </a>
                                    @endcan                              
                                    <a class=" btn btn-sm btn-success aufi-a-eye" href="{{ $imgUrl }}" data-lightbox="roadtrip" data-title="{{ $data->title }}" data-alt="{{ $data->title }}" >
                                        <span class="fas fa-eye"> </span>
                                    </a>
                            </div>
                        </div>
                    @endforeach
                </div>                                               
            </div>
        </div>
    </div>

    {{-- Edit gallery modal --}}
    <div class="modal modal-danger fade" tabindex="-1" id="edit_gallery_modal" role="dialog">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header aufi-modal-primary">
                    <button type="button" class="close" data-dismiss="modal" aria-label="{{ __('voyager.generic.close') }}">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    <h4 class="modal-title">
                        <i class="fas fa-pencil-alt"> </i>
                        {{ __('Modifier photo') }}
                    </h4>
                </div>
                <div class="modal-body">
                    <form class="" id="form_edit_gallery" action="{{ route('voyager.'.$dataType->slug.'.update',0) }}" method="POST" enctype="multipart/form-data">

                        {{ method_field("PUT") }}
                        {{ csrf_field() }}
        
                        <div class="form-group">
                            <label for="title">{{ __('Title') }}</label>
                            <input class="form-control" id="edit_title" type="text" name="title">
                        </div>
                        <div class="form-group">
                            <label for="order">{{ __('Order') }}</label>
                            <input class="form-control" id="edit_order" type="number" name="order">
                        </div>
                        <input type="hidden" name="store_id" value="{{ $storeId }}">
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">
                        {{ __('voyager.generic.cancel') }}
                    </button>
                    <button type="button" id="btn_edit_gallery" class="btn btn-primary">
                        {{ __('voyager.generic.edit') }}
                    </button>
                </div>                
            </div>
        </div>
    </div>   

    {{-- Single delete modal --}}
    <div class="modal modal-danger fade" tabindex="-1" id="delete_modal" role="dialog">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="{{ __('voyager.generic.close') }}"><span
                                aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title"><i class="voyager-trash"></i> {{ __('voyager.generic.delete_question') }} {{ strtolower($dataType->display_name_singular) }}?</h4>
                </div>
                <div class="modal-footer">
                    <form action="{{ route('voyager.'.$dataType->slug.'.index') }}" id="delete_form" method="POST">
                        {{ method_field("DELETE") }}
                        {{ csrf_field() }}
                        <input type="hidden" name="store_id" value="{{ $storeId }}">
                        <input type="submit" class="btn btn-danger float-right delete-confirm"
                                 value="{{ __('voyager.generic.delete_confirm') }} {{ strtolower($dataType->display_name_singular) }}">
                    </form>
                    <button type="button" class="btn btn-default float-right" data-dismiss="modal">
                        {{ __('voyager.generic.cancel') }}
                    </button>
                </div>
            </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->


    <!-- Javascript Libs -->
    <script type="text/javascript" src="{{ voyager_asset('js/app.js') }}"></script>
    <script>
        @if(Session::has('alerts'))
            let alerts = {!! json_encode(Session::get('alerts')) !!};
            helpers.displayAlerts(alerts, toastr);
        @endif

        @if(Session::has('message'))

        // TODO: change Controllers to use AlertsMessages trait... then remove this
        var alertType = {!! json_encode(Session::get('alert-type', 'info')) !!};
        var alertMessage = {!! json_encode(Session::get('message')) !!};
        var alerter = toastr[alertType];

        if (alerter) {
            alerter(alertMessage);
        } else {
            toastr.error("toastr alert-type " + alertType + " is unknown");
        }

        @endif

        var deleteFormAction;
        $('div').on('click', '.delete', function (e) {

            var form = $('#delete_form')[0];

            if (!deleteFormAction) { // Save form action initial value
                deleteFormAction = form.action;
            }

            form.action = deleteFormAction.match(/\/[0-9]+$/)
                ? deleteFormAction.replace(/([0-9]+$)/, $(this).data('id'))
                : deleteFormAction + '/' + $(this).data('id');

            $('#delete_modal').modal('show');
        });

        // edit gallery
        var editFormAction;
        $(document).on('click', '.aufi-a-pencil', function(e) {

            var form = $('#form_edit_gallery')[0];

            if (!editFormAction) { // Save form action initial value
                editFormAction = form.action;
            }

            form.action = editFormAction.match(/\/[0-9]+$/)
                ? editFormAction.replace(/([0-9]+$)/, $(this).data('id'))
                : editFormAction + '/' + $(this).data('id');

            // set data
            $('#edit_title').val($(this).data('title'));
            $('#edit_order').val($(this).data('order'));

            // show modal
            $('#edit_gallery_modal').modal('show');

            $("#btn_edit_gallery").click(function() {
                $("#form_edit_gallery").submit();
            })          
        });

    </script>

    @if(!empty(config('voyager.additional_js')))<!-- Additional Javascript -->
        @foreach(config('voyager.additional_js') as $js)<script type="text/javascript" src="{{ asset($js) }}"></script>@endforeach
    @endif

    </body>
</html>