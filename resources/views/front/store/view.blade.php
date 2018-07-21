@inject('utils', 'App\Services\UtilsService')
@extends('front/master')

@section('page-class', 'main-page inspirations')

@section('head')

    <title>{{ !empty($store->meta_title)?$store->meta_title:$store->name }}</title>
    <meta name="description" content="{{ $store->meta_description }}" />
    <meta name="keywords" content="{{ $store->meta_keywords }}" />

    

@section('content')
    
    <div class="page-header wave-end">
        <div class="container wow fadeInLeft">
            <div class="text-center">
                <div class="col-md-8 dt-right float-md-right">
                    <div class="h1 page title">
                        <h1>
                            Salle de bain {{$store->city}} avec {{ $store->name }}
                        </h1>
                        <span class="filigrane">
                            {{ $store->name }}
                        </span>
                    </div>

                    <div class="row dt-content">
                        <div class="col-md-12 dt-brand">
                            <?php 
                                $images = json_decode($store->wide);
                                $image =(!empty($images[0]))?'storage/'.$images[0]:'/images/no-image.png';
                            ?>
                            <img style="float:left" src="{{$image}}" alt="logo-fiche"> {!! $utils->replaceTplVar($store->description) !!}
                        </div>
                
                        @if(count($store->brandId)>0)
                        <div class="col-md-12">
                            <h2>MARQUES DISTRIBUÉES</h2>
                            <div class="col-md-12 heroSlider-fixed marque">
                                <div class="overlay">
                                </div>
                                <div class="slider responsive">
                                    @foreach($store->brandId as $brand)
                                        <div>
                                            <div class="wrap">
                                                <div class="top-item">
                                                    <img src="{{ asset('storage/'.$brand->image) }}" class="img-fluid" title="{{$brand->title}}">
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                
                                <!-- control arrows -->
                
                                <div class="prev">
                                    <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
                                </div>
                                <div class="next">
                                    <svg-icon><src href="sprite.svg#si-glyph-arrow-right" /></svg-icon>
                                </div>
                            </div>
                
                        </div>

                        @endif 

                       
                        @if(count($store->storePhotoId)>0)
                            <div class="col-md-12">
                                <h2>GALERIE PHOTOS</h2>
                                <div class="col-md-12 heroSlider-fixed galery">
                                    <div class="overlay">
                                    </div>
                                    <div class="slider photo">
                    
                                        @foreach($store->storePhotoId as $photo)
                                        <?php
                                            $image =(!empty($photo->images))?'storage/'.$photo->images:'/images/no-image.png';
                                                            ?>
                                            <div>
                                                <div class="wrap zoom-gallery">
                                                    <a href="{{asset($image)}}" data-source="{{asset($image)}}">
                                                        <div class="top-item">
                    
                                                            <img src="{{asset($image)}}" alt="{{$photo->title}}" class="img-fluid">
                    
                                                        </div>
                                                    </a>
                                                </div>
                    

                                            </div>
                                            @endforeach
                    
                                    </div>
                    
                                    <!-- control arrows -->
                    
                                    <div class="prev2">
                                        <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
                                    </div>
                                    <div class="next2">
                                        <span class="glyphicons glyphicons-chevron-right"></span>
                                    </div>
                                </div>

                            </div>

                        @endif
                    </div>
                </div>
                <div class="col-md-4 store-left float-md-left">
                    <?php 
                        $images = json_decode($store->logo);
                        $image =(!empty($images[0]))?'storage/'.$images[0]:'/images/no-image.png';
                    ?>
                    <div class="col-md-12">
                        <img src="{{ asset($image) }}" alt="{{ $store->slug }}" />
                        <div class="hour">
                            <i class="la la-clock-o"></i>
                            <div class="st-title">HORAIRES D'OUVERTURE</div>
                       </div>
                    </div>
                    <div class="col-md-12 box-hourly" style="display: block;">
                        {!! $utils->replaceTplVar($store->hourly) !!}
                    </div>
                    <div class="col-md-12" style="padding-bottom: 20px;">
                        <div class="col-md-12 text-center dt-buton">
                            <a href="{{ route('page.view', ['prendre-un-rdv']) }}#{{ $store->id }}" class="btn btn-lg btn-alt-primary">{{(__('CONTACTER'))}}</a>
                        </div>  
                    </div>
                    <div class="col-md-12">
                        <div class="hour">
                            <i class="la la-map-marker"></i> 
                            <div class="st-title">COORDONNÉES</div>
                       </div>
                    </div>
                    <div class="col-md-12 box-hourly" style="display: block;">
                        <p>{{$store->address}}</p>
                        <p>{{$store->zip}} {{$store->city}}</p>
                        @if($store->fax != '')
                            <p>Fax: {{$store->fax}}</p>
                        @endif                       
                        <p>Tel: {{$store->phone}}</p>
                        <p>Mail: {{$store->email}}</p>
                        <p> 
                            <?php $url = explode("//",$store->web);?>
                            <a href="<?=($url[0] == $store->web)?'//':'';?>{{$store->web}}" rel="nofollow" target="_blank" class="adherent">{{$store->web}}
                            </a>
                        </p>
                    </div>
                    <div class="col-md-12 box-map" style="display: block;">
                        <div id="map"></div>
                    </div>
                </div>

            </div>
        </div>
    </div>
@endsection


@section('scripts')
    
    @parent
    
    <script  type="application/javascript" >
        $(document).ready(function() {

            $('.photo').slick({
              dots: false,
              infinite: false,
                prevArrow: $('.prev2'),
                nextArrow: $('.next2'),
              infinite: true,
              speed: 300,
              slidesToShow: 2,
              slidesToScroll: 1,
              responsive: [
                {
                  breakpoint: 1024,
                  settings: {
                    slidesToShow: 1,
                    slidesToScroll: 1,
                    infinite: true,
                    dots: false
                  }
                },
                {
                  breakpoint: 600,
                  settings: {
                    slidesToShow: 2,
                    slidesToScroll: 2
                  }
                },
                {
                  breakpoint: 480,
                  settings: {
                    slidesToShow: 1,
                    slidesToScroll: 1,
                    
                  }
                }
                // You can unslick at a given breakpoint now by adding:
                // settings: "unslick"
                // instead of a settings object
              ]
            });


            $('.zoom-gallery').magnificPopup({
                type: "image",
                delegate: "a",
                closeOnContentClick: false,
                closeBtnInside: false,
                mainClass: 'mfp-with-zoom mfp-img-mobile',
                
                gallery: {
                    enabled: true
                },
                zoom: {
                    enabled: true,
                    duration: 300, // don't foget to change the duration also in CSS
                    opener: function(element) {
                        return element.find('img');
                    }
                }
                
            });        


      
            $('.les').find('ul li').prepend('<img class="icon-plus" src="/images/icon-plus.jpg" />');

            $('.responsive').slick({
              dots: false,
                prevArrow: $('.prev'),
                nextArrow: $('.next'),
              infinite: true,
              speed: 300,
              slidesToShow: 4,
              slidesToScroll: 1,
              responsive: [
                {
                  breakpoint: 1024,
                  settings: {
                    slidesToShow: 1,
                    slidesToScroll: 1,
                    infinite: true,
                    dots: false
                  }
                },
                {
                  breakpoint: 600,
                  settings: {
                    slidesToShow: 2,
                    slidesToScroll: 2
                  }
                },
                {
                  breakpoint: 480,
                  settings: {
                    slidesToShow: 1,
                    slidesToScroll: 1
                  }
                }
                // You can unslick at a given breakpoint now by adding:
                // settings: "unslick"
                // instead of a settings object
              ]
            });


            
            function initMap() {
                    var center = {lat: {{ $store->lat }}, lng: {{ $store->lng }} };
                    var map = new google.maps.Map(document.getElementById('map'), {
                    zoom: 6,
                    center: center
                });
                var INFOWINDOW = new google.maps.InfoWindow();
                var marker = new google.maps.Marker({
                    position: {lat: {{ $store->lat }}, lng: {{ $store->lng }} },
                    map: map,
                    icon :"/images/pin-2.png",
                });

                google.maps.event.addListener(marker,"click", function () {
                    INFOWINDOW.setContent('<div class=\"des-map\"><b>{{ $store->name }}</b><br />{{ $store->address }} <br /> {{$store->zip}} {{$store->city}}<br /></div>');
                    INFOWINDOW.open(map, marker);
                    return false;
                });
            
            }

        });
    </script>    
    <script type="application/javascript">
        function initMap() {
                var center = {lat: {{ $store->lat }}, lng: {{ $store->lng }} };
                var map = new google.maps.Map(document.getElementById('map'), {
                zoom: 6,
                center: center
            });
            
            var INFOWINDOW = new google.maps.InfoWindow();


            var marker = new google.maps.Marker({
                position: {lat: {{ $store->lat }}, lng: {{ $store->lng }} },
                map: map,
                icon :"/images/pin-2.png",
               
            });

            google.maps.event.addListener(marker,"click", function () {
                INFOWINDOW.setContent('<div class=\"des-map\"><b>{{ $store->name }}</b><br />{{ $store->address }} <br /> {{$store->zip}} {{$store->city}}<br /></div>');
                INFOWINDOW.open(map, marker);
                return false;
            });
            
        }
    </script>
    
    <script async defer src="https://maps.googleapis.com/maps/api/js?key={{setting('site.api_map')}}&callback=initMap"></script>
    

@endsection