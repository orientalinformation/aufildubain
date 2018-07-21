@inject('utils', 'App\Services\UtilsService')
@extends("front/master")

@section('top_menu', 'inspirations')

@section('head')
    @parent
    <title>{{ !empty($trend->meta_title)?$trend->meta_title:$trend->title }}</title>
    <meta name="description" content="{{ $trend->meta_description }}" />
    <meta name="keywords" content="{{ $trend->meta_keywords }}" />

    @if ($trend->cover)
    <style>
        .page-header { 
            background: url('{{ Voyager::image($trend->cover) }}') center / cover no-repeat #00b4dd !important;
        }
        .page-header h1 {
            color: #ffffff;
        }
    </style>
    @endif
@endsection

@section('page-class', 'main-page inspirations')

@section('content')
<?php
$gridItems = json_decode($trend->content);
?>
<div class="page-header wave-end">
    <div class="container wow fadeInLeft">
        <div class="container text-center">
            <div class="h1 page title">
                <h1>{{$trend->title}}</h1>
                <span class="filigrane">{{__('Inspiration')}}</span>
            </div>
            <div class="play-diapo">
                <a href="#gallery-1" class="btn-gallery">
                    <img src="{{ asset("/images/play-button.png") }}" class="img-fluid m-auto" alt="">
                </a>
                <div class="diapo" id="gallery-1">
                    @foreach ($gridItems as $item)
                        @if ($item->type == 'picture')
                            <a href="{{ Voyager::image($item->data->image) }}" data-source="{{ Voyager::image($item->data->image) }}" title="{{$item->data->description}}"></a>
                        @endif
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>
<div class="page-content">
    <div class="container">
        <div class="loader-inspirations" style="display: none;">
            <img src="/images/loader.gif" alt="" style="margin: auto; display: block;" class="img-fluid">
        </div>
        <div class="grid grid-packery" data-zoomtitle="<p>Tendance</p><p>{{$trend->title}}</p>">
            <div class="grid-sizer"></div>
            <div class="gutter-sizer"></div>
            @foreach ($gridItems as $item)
            <?php
            $gridSize = "";
            $size = isset($item->size)?intval($item->size):1;
            $size = $size > 0 ? $size : 1;
            if ($size > 1) {
                $gridSize = "grid-item--width".$size;
            }
            ?>
                @if ($item->type=='picture')
                <div class="grid-item {{$gridSize}} zoom-gallery">
                    <div class="grid-item-body">
                        <a href="{{ Voyager::image($item->data->image) }}" class="item-block" data-source="{{ Voyager::image($item->data->image) }}"
                            title="{{ $item->data->title }}">
                            <img class="item-image" src="{{ Voyager::image($item->data->image) }}" alt="{{$item->data->description}}">
                        </a>
                    </div>
                </div>
                @endif
                @if ($item->type=='color')
                <div class="grid-item {{$gridSize}} ">
                    <div class="grid-item-body">
                        <div class="row">
                            @foreach ($item->data->colors as $color)
                            @if ($color != '#000000')
                            <div class="col-4" style="margin-bottom: 5%">
                                <div style="background-color:{{ $color }};" class="color-block">
                                    <img style="width:100%" src="{{ asset('images/colorblock.png') }}" alt="">
                                </div>
                            </div>
                            @endif
                            @endforeach
                        </div>
                    </div>
                </div>
                @endif

                @if ($item->type=='text')
                <div class="grid-item {{$gridSize}}"  style="background: #848484; padding: 40px 20px; color: #fafafa">
                    <div class="grid-item-body">
                        <div style="color: #cccccc; font-size: 1.35em; font-weight: 300; letter-spacing: 1px;">TENDANCE</div>
                        <span style="font-weight: 900; font-size: 2.075em; margin-bottom: 10px;">{{$item->data->title}}</span>
                    </div>
                    <?php
                    $desc = $item->data->description;
                    $desc = explode("\n", $desc);
                    $desc = "<p>" . implode('</p><p>', $desc) . "</p>";
                    ?>
                    <p>{!! $desc !!}</p>
                </div>
                @endif
            @endforeach
        </div>
    </div>
</div>
</div>
@endsection

@section('scripts')
    @parent
    <script src="/js/inspirations.js"></script>
    <script>
        var $grid;
        $(document).ready(function() {
            $('.grid-packery').imagesLoaded( function() {
                $grid = $('.grid-packery').packery({
                    columnWidth: '.grid-sizer',
                    gutter: '.gutter-sizer',
                    itemSelector: '.grid-item',
                    percentPosition: true
                });
            });
        });
    </script>
@endsection