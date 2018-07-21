@inject('utils', 'App\Services\UtilsService')
@inject('categories', 'App\Services\CategoriesService') 
@extends('front/master') 
@section('page-class', 'products')
@section('head')

    <title>{{ !empty($page->meta_title)?$page->meta_title:$page->title }}</title>
    <meta name="description" content="{{ $page->meta_description }}" />
    <meta name="keywords" content="{{ $page->meta_keywords }}" />
@parent
<style type="text/css" media="screen">
    div.category-menu,
    div.category-menu>ul {
        padding-left: 0px;
    }
    div.category-menu>ul li {
        list-style: none;
        padding: 10px;
        border-bottom: 1px solid #E6E6E6;
    }
    .sub-menu {
        display: none;
        padding-left: 15px;
    }
    .sub-menu li:last-child {
        border-bottom: 0px;
    }
    .sub-menu li a {
        color: #000;
    }
    .sub-menu li:hover a {
        color: #00b4dd;
    }
</style>
@endsection
 
@section('content')
<div class="page-header wave-end">
    <div class="container wow fadeInLeft">
        <div class="text-center">
            <div class="h1 page title">
                <h1>
                    {{$page->title }}
                </h1>
                <span class="filigrane">
                    {{ __('NOS PRODUITS') }}
                </span>
            </div>
            <div class="row">
                <div class="col-md-8 offset-md-2">
                    {!! $utils->replaceTplVar($page->body) !!}
                </div>
            </div>
        </div>
    </div>
</div><!-- /page-header -->
<div class="page-content">
    <div class="container">
        <div class="row">
            <div class="col-md-3 category-menu">
                <ul class="wrap-menu">
                    @foreach($categories->topCategories() as $category)
                    <li class="top-category"><a href="{{ route('category.view', $category->slug) }}">{{$category->name}}</a>
                        <ul class="sub-menu">
                            @foreach($categories->subCategories($category->id) as $subcategory)
                            <li><h2><a href="{{ route('subCategory.view', [$category->slug,$subcategory->slug]) }}">{{$subcategory->name}}</a></h2></li>
                            @endforeach
                        </ul>
                    </li>
                    @endforeach
                </ul>
            </div>
            <div class="col-md-9 ">
                <div class="loader-inspirations">
                    @include('front/utils/loading')
                </div>
                <div class="pgrid grid grid-inspi">
                    @foreach($categories->topCategories() as $category)
                    <div class="pgrid-item grid-item">
                        <a href="{{ route('category.view', $category->slug) }}" class="item-block">
                            @if (!$category->image)
                                <img src="{{ asset('images/no-image.png') }}" class="img-fluid" alt="">
                            @else
                                <img src="{{ asset('storage/'.$category->image) }}" style="width:100%" alt="">
                            @endif
                            <div class="block-textgrid">
                                <span>{{__('CATÉGORIES')}}</span>
                                <span class="cat">{{$category->name}}</span>
                                <p style="height: 60px; overflow:hidden">
                                    {{strip_tags($category->description)}}
                                </p>
                            </div>
                        </a>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
 
@section('scripts') @parent
<script>
    $(document).ready(function() {
        $(window).load(function(){
            $('.loader-inspirations').fadeOut(1000);
            $('.pgrid').fadeIn(500);
            $('.pgrid').fadeTo(500, 1);
        });

        $('.grid').imagesLoaded( function() {
            $('.grid').masonry({
                itemSelector: '.grid-item',
                gutter: 0,
                percentPosition: true
             
            });
        });
                
        var titleDetail = $('.grid').attr('data-zoomTitle');
        $('.grid-item.zoom-gallery a').append('<div class="zoom-loop"><img src="/images/Zoomicon.png" class="img-fluid" alt=""></div>');
        $('.grid-item.zoom-gallery a').mouseover(function(){
            $(this).find('.zoom-loop').toggleClass('animated zoomInUp');
        });
        $('.grid-item.zoom-gallery a').mouseout(function(){
            $(this).find('.zoom-loop').removeClass('animated zoomInUp');
        })
            $('.zoom-gallery').magnificPopup({
                delegate: 'a',
                type: 'image',
                closeOnContentClick: false,
                closeBtnInside: false,
                mainClass: 'mfp-with-zoom mfp-img-mobile',
                image: {
                    verticalFit: true,
                    titleSrc: function(item) {
                    return '<p>' + item.el.attr('title') + '</p>';
                    }
                },
                tLoading: 'Chargement...',
                gallery: {
                    enabled: true,
                },
                zoom: {
                    enabled: true,
                    duration: 300, // don't foget to change the duration also in CSS
                    easing: 'ease-out',
                    opener: function(element) {
                    // return element.find('img');
                    return element.is('.item-block') ? element : element.find('.item-block');
                    }
                }
            });
            $('.zoom-gallery').click(function(){
                $('.mfp-content').append('<div class="fill-zoom">' + titleDetail +'</div>');
                $('.mfp-content').addClass('animated pulse');
            });
            $('a.btn-gallery').on('click', function(e) {
            e.preventDefault();
            
            var gallery = $(this).attr('href');
            var InterVar;
            
            
            $(gallery).magnificPopup({
                delegate: 'a',
                removalDelay: 500,
                type: 'image',
                closeOnContentClick: false,
                closeBtnInside: false,
                mainClass: 'mfp-with-zoom mfp-img-mobile animated bounceIn',
                image: {
                    verticalFit: true,
                    titleSrc: function(item) {
                    return '<p>' + item.el.attr('title') + '</p>';
                    }
                },
                tLoading: 'Chargement...',
                gallery: {
                    enabled: true,
                },
                callbacks: {
                    open: function () {
                        InterVar = setInterval(function () {
                        $.magnificPopup.instance.next();
                        }, 5000);
                    },
                    close: function() {
                        clearInterval(InterVar);
                    },
                    imageLoadComplete: function() {
                        if ($('.fill-zoom').length == 0) {
                        $('.mfp-content').append('<div class="fill-zoom">' + titleDetail +'</div>');
                        $('.mfp-content').addClass('animated fadeIn');
                        }
                    },
                    beforeOpen: function() {
                        this.st.mainClass = this.st.el.attr('data-effect');
                    }
                    },
                    midClick: true
                
            }).magnificPopup('open');
            });
            
        });
        $(window).load(function(){
            $('.loader-inspirations').fadeOut(1000);
            $('.grid').fadeIn(1500);
            $('.grid').fadeTo( 1000, 1);
        });
</script>
@endsection