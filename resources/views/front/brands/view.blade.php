@inject('categories', 'App\Services\CategoriesService')
@inject('svProducts', 'App\Services\ProductsService')
@inject('utils', 'App\Services\UtilsService')

@extends('front/master') 
@section('page-class', 'main-page inspirations')

@section('top_menu', '/nos-marques.html') 

@section('head')
    <title>{{ !empty($brand->meta_title)?$brand->meta_title:$brand->name }}</title>
    <meta name="description" content="{{ $brand->meta_description }}">
    <meta name="keywords" content=" {{ $brand->meta_keywords }} "> 

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


    .category ul li {
        list-style: none;
        border-bottom: 1px solid #e5e5e5;
        padding: 10px;
    }

    .category ul {
        padding-left: 0px;
    }

    .top-item img {
        max-width: 100%;
        width: 100%;
        border-radius: 10px 10px 0 0;
    }

    .top-item {
        position: relative;

    }

    .product {
        border: 1.1px solid #e5e5e5;
        border-radius: 10px;
    }

    .top-item:before {
        content: '';
        height: 13px;
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        -webkit-transition: ease-in-out 0.4s;
        -ms-transition: ease-in-out 0.4s;
        -moz-transition: ease-in-out 0.4s;
        transition: ease-in-out 0.4s;
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

    .bot-item {
        color: #000;
        padding: 0px 0px 0px 20px;

    }

    .inspirations .section-inspiration .block-inspiration2 .grid.grid-inspi .grid-item:nth-child(1) a {
        background-image: none;
    }



    .img_brand {
        position: absolute;
        right: 15px;
        border-bottom: 0;
        border: 1px solid #e5e5e5;
        max-width: 90px;
        bottom: 0px;
        background: #fff;
        border-radius: 10px 10px 0 0;
        z-index: 3;

        max-width: 40%;
        padding: 5px;
    }

    .product:hover .top-item:before {
        border-color: #00b4dd;


    }

    .product .top-item:before {
        border-top: 13px solid transparent;
        content: '';
        position: absolute;
        border-radius: 10px 10px 0 0;
        top: 0;
        bottom: 0;
        right: 0;
        left: 0;
        width: 100%;
        height: 100%;
        z-index: 1;
        /*background: url(/images/inspirations/backblock-noir.png) center bottom no-repeat;*/
        background-size: 100%;
        -webkit-transition: linear 0.4s;
        -ms-transition: linear 0.4s;
        -moz-transition: linear 0.4s;
        transition: linear 0.4s;
    }

    .product:hover {
        -webkit-box-shadow: 0px 0px 70px -10px rgba(0, 0, 0, 0.54);
        -moz-box-shadow: 0px 0px 70px -10px rgba(0, 0, 0, 0.54);
        box-shadow: 0px 0px 70px -10px rgba(0, 0, 0, 0.54);
    }



    .img-hover {
        position: absolute;
        top: 0px;
        background: url(/images/inspirations/backblock-bleu.png);
        height: 100%;
        width: 100%;
        background-position-y: bottom;
        opacity: 0.5;
        border-radius: 10px;
    }

    .img_brand,
    .btn-arrow,
    .img-hover {
        display: none;
    }

    .img-hover img {

        height: 100px;
    }

    .ct-btn-arrow {
        height: 35px;
    }

    .pgrid-item {
        width: 30%;
        margin-bottom: 10px;

    }

    .pgrid {
        max-width: 1200px;
        visibility: hidden;
    }

    .pgrid a {
        color: #000;
    }



    .sub-menu {
        display: none;
        padding-left: 15px;
    }

    .wrap-menu li ul li:last-child {
        border-bottom: 0px;

    }

    .wrap-menu li ul li a {
        color: #000;
    }

    .sub-menu li a {
        color: #000;
    }

    .sub-menu li.active a {
        color: #00b4dd;
    }

    .sub-menu li:hover a {
        color: #00b4dd;
    }

    .wrap-menu .top-category .active {
        display: block;
    }

    .view-more { visibility: hidden; }
    .view-more-loading { text-align: center; display: none; }
</style>
@endsection
 
@section('content')
    <div class="page-header wave-end">
        <div class="container wow fadeInLeft">
            <div class=" text-center">
                <div class="h1 page title">
                    <h1>
                        {{$brand->title}}
                    </h1>
                    <span class="filigrane">
                        {{ __('NOS MARQUES') }}
                    </span>
                </div>
                <div class="row">
                    <div class="col-md-8 offset-md-2">
                        {!! $utils->replaceTplVar($brand->description) !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="page-content">
        <div class="container">
            <div class="col-md-10 offset-md-1">
                <div class="loader-inspirations">
                    @include('front/utils/loading')
                </div>
                <div class="pgrid">
                    @include('front/products/partial')
                </div>
                <div class="view-more" style="text-align: center">
                    <a href="javascript:void(0);" class="load-more-btn">
                        <img src="{{asset('images/plus-circle.png')}}">
                        {{__('LOAD MORE')}}
                    </a>
                </div>
                <div class="view-more-loading">
                    <img src="{{ asset('images/Spinner-1s-50px.gif') }}" alt=""> {{__('Loading, please wait')}}
                </div>
            </div>
        </div>
    </div>
    <div class="pgrid-staging clearfix" style="width:0px; height: 0px; visibility: hidden; overflow: hidden;"></div>
@endsection
 
@section('scripts') @parent
<script>
    var page = 2;
    $(window).load(function(){
        $('.loader-inspirations').fadeOut(1000);
        $('.pgrid').fadeIn(500); 
        $('.pgrid').fadeTo(500, 1);
        $('.pgrid').css('visibility', 'visible');
        $('.view-more').css('visibility', 'visible');
    });
    $(document).ready(function(){
        $('.load-more-btn').click(function (e) {
            e.preventDefault();
            $('.view-more').hide();
            $('.view-more-loading').show();
            $.get(
                '{{ Request::url() }}?page='+page,
                function(data) {
                    if (data.trim().length == 0) {
                        $('.view-more').hide();
                        $('.view-more-loading').hide();
                        return;
                    }
                    page++;
                    $data = $(data);
                    $('.pgrid-staging').append($data);
                    $('.pgrid-staging').imagesLoaded()
                    .always(function(instance) {
                        $('.view-more').show();
                        $('.view-more-loading').hide();
                    })
                    .progress(function(instance, image){
                        if (!$(image.img).hasClass('img-product')) return;
                        $item = $(image.img).closest('.pgrid-item');
                        $item = $item.detach();
                        $('.pgrid').append($item);
                        $('.pgrid').packery('appended', $item);
                        $('.pgrid').packery('shiftLayout');
                        $item.css('visibility', 'visible');
                    });
                }
            );
        });
        $('.pgrid').imagesLoaded(function() {
            $('.pgrid').packery({
                itemSelector: '.pgrid-item',
                gutter: 10,
                percentPosition: true
            });
            $('.pgrid .pgrid-item').css('visibility', 'visible');
            $('.pgrid').css('visibility', 'visible');
            $('.lds-css').hide();
        });
        $('.sub-menu li.active').parent().show();
        $('.product').mouseenter(function() {
            $(this).find('.btn-arrow').fadeIn(300);
            $(this).find('.img-hover').fadeIn(300);
            $(this).find('.img_brand').fadeIn(300);
        }).mouseleave(function() {
            $(this).find('.btn-arrow').fadeOut(300);
            $(this).find('.img-hover').fadeOut(300);    
            $(this).find('.img_brand').fadeOut(300);    
        });
    });
</script>
@endsection