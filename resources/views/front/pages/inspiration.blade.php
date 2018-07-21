@inject("tendances",'App\Services\TrendsService')
@inject("utils",'App\Services\UtilsService')
@extends('front/master')

@section('page-class', 'inspirations')

@section('head')
    <title>{{ !empty($page->meta_title)?$page->meta_title:$page->title }}</title>
    <meta name="description" content="{{ $page->meta_description }}" />
    <meta name="keywords" content="{{ $page->meta_keywords }}" />
    @parent
@endsection

@section('content')
<div class="page-header wave-end">
    <div class="container wow fadeInLeft">
        <div class="text-center">
            <div class="h1 page title">
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
</div>
<div class="page-content">
    <div class="container">
        <div class="loader-inspirations">
            @include('front/utils/loading')
        </div>
        <div class="pgrid grid grid-inspi">
            @foreach ($tendances->all() as $tendance)
            <div class="pgrid-item grid-item">
                <a href="{{ route('tendance.view', $tendance->slug) }}" class="item-block">
                    @if (!$tendance->image)
                        <img src="{{ asset('images/no-image.png') }}" class="img-fluid" alt="">
                    @else
                        <img src="{{ asset('storage/'.$tendance->image) }}" style="width:100%" alt="">
                    @endif
                    <div class="block-textgrid">
                        <span>{{__('Tendance')}}</span>
                        <h2><span class="cat h2-title">{{$tendance->title}}</span></h2>
                        <p>{{ strip_tags( $tendance->description ) }}</p>
                    </div>
                </a>
            </div>
            @endforeach
        </div>
    </div>
</div>
@endsection


@section('scripts')
    @parent
    <script>
        $(document).ready(function() {
            $('.grid-inspi').imagesLoaded( function() {
                $('.grid-inspi').masonry({ itemSelector: '.grid-item', horizontalOrder: false });
            });
            $(window).load(function(){
                $('.loader-inspirations').fadeOut(1000);
                $('.grid').fadeIn(1500);
                $('.grid').fadeTo( 1000, 1);
            });
        });
    </script>
@endsection