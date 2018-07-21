@inject('utils', 'App\Services\UtilsService')
@inject("brands",'App\Services\BrandsService')
@extends('front/master')

@section('page-class', 'brands')

@section('head')
    <title>{{ !empty($page->meta_title)?$page->meta_title:$page->title }}</title>
    <meta name="description" content="{{ $page->meta_description }}" />
    <meta name="keywords" content="{{ $page->meta_keywords }}" />

    @parent
@endsection

@section('content')
<div class="page-header wave-end">
    <div class="container wow fadeInLeft">
        <div class="container text-center">
            <div class="h2 page title">
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
<div class="container page-content">
    <div class="row">
    @foreach($brands->all() as $brand )
        @if ($brand->show_on_brand==1)
        <div class="col-6 col-md-3 col-xl-2">
            <a href="{{ route('brand.view', $brand->slug) }}">
                <div class="brand">
                    <div class="hidden"><h2>{{ $brand->title }}</h2></div>
                    @if ($brand->image)
                    <img src="{{ asset('/storage/'.$brand->image) }}" alt="{{$brand->title}}" title="{{$brand->title}}">
                    @else
                    <img src="{{ asset('/images/no-image.png') }}" alt="{{$brand->title}}" title="{{$brand->title}}">
                    @endif
                </div>
            </a>
        </div>
        @endif
    
    @endforeach
    </div>
</div>

@endsection


@section('scripts')
    @parent
@endsection