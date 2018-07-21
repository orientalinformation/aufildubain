@inject('utils', 'App\Services\UtilsService')
@inject('solutions', 'App\Services\SolutionsService')

@extends('front/master')

@section('page-class', 'projects')

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
                <h1>{{$page->titre_h1 or $page->title}}</h1>
                <span class="filigrane">
                    {{ __('VOTRE RÉSEAU D\'EXPERTS') }}
                </span>
            </div>
            <div class="row">
                <div class="col-md-10 offset-md-1">
                    {!! $utils->replaceTplVar($page->body) !!}
                </div>
            </div>
        </div>
    </div>
</div>
<div class="page-content">
    <div class="block-inspiration2">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="loader-inspirations">
                        @include('front/utils/loading')
                    </div>
                    <div class="pgrid grid grid-inspi">
                        @foreach($solutions->all() as $project)
                        <?php $images = json_decode($project->images); ?>
                        <div class="pgrid-item grid-item">
                            <a href="{{ route('project.view', $project->slug) }}" class="item-block">
                                @if (!is_array($images))
                                    <img src="{{ asset('images/no-image.png') }}" class="img-fluid" alt="">
                                @else
                                    <img src="{{ asset('storage/'.array_shift($images)) }}" style="width:100%" alt="">
                                @endif
                                <div class="block-textgrid">
                                    <span>{{__('PROJET')}}</span>
                                    <h2><span class="cat">{{$project->name}}</span></h2>
                                    <p style="height: 60px; overflow:hidden">
                                        {{strip_tags($project->summary)}}
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
</div>
@endsection


@section('scripts')
    @parent
    <script src="/js/home.js"></script>    
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
@endsection