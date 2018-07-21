@inject('utils', 'App\Services\UtilsService')
@extends('front/master')

@section('page-class', 'product-detail')
@section('top_menu', 'products')

@section('head')

    <title>{{ !empty($product->meta_title)?$product->meta_title:$product->name }}</title>
    <meta name="description" content="{{ $product->meta_description }}" />
    <meta name="keywords" content="{{ $product->meta_keywords }}" />

    @parent

    <style type="text/css" media="screen">
        *:focus {
            outline: none;
        }
        .inspirations #main {
            padding-bottom: 0px !important;

        }

        .inspirations .section-inspiration .block-inspiration1 p {
            font-family: "Uni Neue", sans-serif;
            margin-top: 0px;
            font-size: 1em;
            font-weight: normal;
            line-height: 20px;
            padding-right: 10px;
        }
        .fill .filigrane {
            font-size: 2em;
            top: -65px;
            

        }
        .inspirations .h2-title {
            text-align: left;
            padding-top: 10px;
        }
        .dt-left img {
            max-width: 100%;
            border: 1px solid #dddddd;
            -webkit-box-shadow: 0px 0px 70px -10px rgba(0, 0, 0, 0.54);
            -moz-box-shadow: 0px 0px 70px -10px rgba(0, 0, 0, 0.54);
            box-shadow: 0px 0px 70px -10px rgba(0, 0, 0, 0.54);
            

        }
        .dt-left {
            padding-left: 0px;
        }
        .inspirations .h2-title:before {
            right: auto;
            top: -25px;
        }
        .inspirations .h2-title.fill .filigrane {
            left: -60px;
            
        }
        .dt-title {
            margin-top: -20px;          
            display: block;
        }
        .ref {
            text-align: left;
            line-height: 40px !important;
            color:#757575;
        }
        .dt-brand  img {
            max-width: 200px;
            background-color: #fff;
            border:1px solid #dddddd;
            border-radius: 10px;
            padding: 15px;     
            margin-left: 15px;       
        }
        .dt-right {
            text-align: left;
        }
        .dt-des {
            margin-top: 40px;
            
        }
        .dt-des p {
            font-weight: normal !important;
        }
        .dt-buton a {
            background-color: #00b4dd;
            color: #fff;
            padding: 5px 10px 5px 10px;
            max-width: 65%;
            display: block;
            margin: 0 auto;
            font-size: 1.5em;
            text-align: center;
        }

        .dt-buton {
            margin-top: 40px;
            padding: 20px;
            border-top: 1px solid #dddddd;
            border-bottom: 1px solid #dddddd;
        }
        .les {
            
            margin-top: 20px;

        }
        .les p {
            font-size: 1.3em !important;
            font-weight: normal !important;
        }
        .les ul {
            padding: 0px;
            margin-top: 20px;
            margin-left: -10px;
        }
        .les ul li img {
            max-width: 50px;
        }
        .les ul li {
            list-style: none;
            font-size: 1.2em;
            padding: 5px;
            display: inline-block;
            margin-left: 5px;
            /*width: 250px;*/
        }
        .icon-plus {
            margin-right: 10px;
        }
        
        .top-item:after {
            content: '';
            background: url(/images/after-img-conseil.png) center bottom no-repeat;
            background-size: cover;
            height: 50px;
            width: 100%;
            position: absolute;
            bottom: 0;
            left: 0;
            z-index: 100;
        }
        .top-item {
            position: relative;
            border: 1px solid #dddd;
            border-bottom: 0px;
            border-radius: 10px 10px 0 0;
            background: #fff;
        }
        .more-product .top-item img {
            border-radius: 10px;
            
        }

        .bot-item{
            border: 1px  solid #dddd;
            border-top: 0px;
            border-radius: 0px 0px 10px 10px;
            
        }

        .bot-item, .bot-item a {
            color: #000;
            padding: 0px 10px 20px 20px;
            background: #fff;
            margin-top: -20px;
            height: 130px;
            overflow: hidden;

        }

        
        /* Custom Arrow slide bottom */

        

        .heroSlider-fixed {
            padding-left: 0;
            margin-top: 20px;
        }

        .heroSlider-fixed .responsive img {
            width: 100%;
            height: auto;
            padding: 5px;
            /*height: 160px;*/
            object-fit: contain;
            border-radius: 10px;
        }
        /* Custom Arrow */
        .prev{
            color: #00b4dd;
            position: absolute;
            top: 38%;
            opacity: 0.5;
            left: -1em;
            font-size: 2em;
        }
        .next:hover,.prev:hover{
            cursor: hand;
            opacity: 1;
            font-size: 2.5em;
        }
        .next{
            color: #00b4dd;
            position: absolute;
            top: 38%;
            opacity: 0.5;
            right: -0.5em;
            font-size: 2em;
            
        }
        .mfp-bottom-bar {
            display: none;
        }

        </style>
@endsection

@section('content')
<div class="page-header wave-end">
    <div class="container wow fadeInLeft">
        <div class="border-bottom">
            <div class="col-md-8 dt-right float-md-right">
                <div class="h2 title">
                    <h1>
                        {{$product->title}} -
                        <?=$product->grip;?>
                    </h1>
                    <span class="filigrane">
                                    {{ $category->name }}
                                </span>
                </div>
                <div>
                    <p class="ref">Ref: {{$product->reference}}</p>
                </div>
            
                <div class="row dt-content">
                    <div class="dt-brand">
                        @if (is_object($product->brandId))
                        <a href="{{route('brand.view', $product->brandId->slug)}}">
                                        <img src="/storage/{{$product->brandId->image}}" alt="{{$product->brandId->meta_title or $product->brandId->title}}">
                                    </a> @endif
                    </div>
                    <div class="col-md-12 dt-des">
                        {!! $utils->replaceTplVar($product->description) !!}
                    </div>
                    <div class="col-md-12">
                        <div class="col-md-12 text-center border-top">
                            <a class="btn btn-lg btn-primary mt-3 mb-3" href="/trouvez-votre-magasin.html">{{__('TROUVER UNE SALLE PROCHE DE CHEZ VOUS')}}</a>
                        </div>
                    </div>
            
                    @if($product->more_1 != '')
                    <div class="col-md-12 les">
                        <p>{{__('LES + DU PRODUIT')}}</p>
            
                        <ul>
                            @if($product->more_1 != '')
                            <li>{{$product->more_1}}</li>
                            @endif @if($product->more_2 != '')
                            <li>{{$product->more_2}}</li>
                            @endif @if($product->more_3 != '')
                            <li>{{$product->more_3}}</li>
                            @endif
                        </ul>
                    </div>
                    @endif
                </div>
            
            </div>
            <div class="col-md-4 dt-left float-md-left mt-3">
                <?php 
                    $images = json_decode($product->images);
                    $image =(!empty($images[0]))?'storage/'.$images[0]:'/images/no-image.png';
                ?>
                <div class="zoom-gallery">
                        <a href="{{asset($image)}}" data-source="{{asset($image)}}">
                            <img src="{{ asset($image) }}" alt="{{$product->slug}}" />
                        </a>
                        
                </div>
                
                
                @if(!empty(json_decode($product->secondary_images)))
                <div class="col-md-12 heroSlider-fixed">
                    <div class="overlay">
                    </div>
                    <div class="slider secone-img container-gallery">
                        <?php
                            $images =  json_decode($product->secondary_images);
                        ?>
                            
                        @foreach( $images as $key => $image )
                            <div>
                                <div class="wrap zoom-gallery">
                                    <a href="{{ asset('storage/'.$image) }}" data-source="{{ asset('storage/'.$image) }}">
                                        
                                        <img src="{{ asset('storage/'.$image) }}" class="img-fluid" alt="{{$product->image_alt}}">
                                        
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
                        <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
                    </div>
                </div>

                @endif
            </div>
            
            <div class="clearfix"></div>
        </div>
            
    </div>
</div>

<div class="page-content">
        <div class="container more-product">
            <h2 class="h2 title">DÉCOUVREZ ÉGALEMENT </h2>
            <div class="col-md-12 heroSlider-fixed">
                <div class="overlay"></div>

                <div class="grid">
                        @foreach( $productSubs as $key => $p )
                        <?php 
                            $img = json_decode($p->images);
                            $image = (!empty($img[0]))?'storage/'.$img[0]:'/images/no-image.png'; 
                        ?>
                        
                            <div class="wrap grid-item col-12 col-sm-6 col-md-4 col-lg-3">
                                <a href="{{ route('product.view', [$category->slug,$slugSubCategory, $p->slug]) }}">
                                    <div class="top-item">
                                        <img src="{{ asset($image) }}" class="card-img-top" title="{{$p->title}}" >
                                    </div>
                                </a>    
                                <div class="bot-item">
                                    <a href="{{ route('product.view', [$category->slug, $slugSubCategory, $p->slug]) }}">
                                        <h3 class="title-item" style="font-size: 20px;">{{$p->title}}</h3>
                                        {{$p->grip}}                                       
                                    </a>    
                                        
                                </div>

                            </div>
                        
                    @endforeach
                </div>
                <!--   <div class="slider responsive">
                        
                    @foreach( $productSubs as $key => $p )
                        <?php 
                            $img = json_decode($p->images);
                            $image = (!empty($img[0]))?'storage/'.$img[0]:'/images/no-image.png'; 
                        ?>
                        <div>
                            <div class="wrap">
                                <a href="{{ route('product.view', [$category->slug,$slugSubCategory, $p->slug]) }}">
                                    <div class="top-item">
                                        <img src="{{ asset($image) }}" class="img-fluid" title="{{$p->title}}" >
                                    </div>
                                </a>    
                                <div class="bot-item">
                                    <a href="{{ route('product.view', [$category->slug, $slugSubCategory, $p->slug]) }}">
                                        <h3 class="title-item" style="font-size: 20px;">{{$p->title}}</h3>
                                        {{$p->grip}}                                       
                                    </a>    
                                        
                                </div>

                            </div>

                        </div>
                    @endforeach

                        
                </div> -->

                <!-- control arrows -->

                {{-- <div class="prev">
                    <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
                </div>
                <div class="next">
                    <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
                </div> --}}
            </div>
        </div>
        
    </div>
    
</div>
@endsection


@section('scripts')
    @parent
    <script src="/js/inspirations.js"></script>
    <script>
        $(document).ready(function() {
            $('.grid').imagesLoaded( function() {
                $('.grid').masonry({
                    itemSelector: '.grid-item',
                    gutter: 0,
                    percentPosition: true
                });
            });
            $('.grid-inspi').masonry({
                itemSelector: '.grid-item',
                horizontalOrder: false,
            });
            $('.grid-details').masonry({
                itemSelector: '.grid-item',
                horizontalOrder: false,
            });
        });

        $(window).load(function(){
            $('.loader-inspirations').fadeOut(1000);
            $('.grid').fadeIn(1500);
            $('.grid').fadeTo( 1000, 1);
        });
    </script>
    {{-- 
    <script>
        $(document).ready(function() {

           $('.zoom-gallery').magnificPopup({
                delegate: 'a',
                type: 'image',
                closeOnContentClick: false,
                closeBtnInside: false,
                mainClass: 'mfp-with-zoom mfp-img-mobile',
                image: {
                    verticalFit: true,
                    titleSrc: function(item) {
                        return item.el.attr('title') + ' &middot; <a class="image-source-link" href="'+item.el.attr('data-source')+'" target="_blank">image source</a>';
                    }
                },
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

            $('.les').find('ul li').prepend('<img class="icon-plus" src="/images/plus-circle.png" />');

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


            $('.secone-img').slick({
              dots: false,
                prevArrow: $('.prev2'),
                nextArrow: $('.next2'),
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


        });
    </script>  --}}


@endsection