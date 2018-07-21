@inject('utils', 'App\Services\UtilsService')
@extends('front/master')

@section('page-class', 'projects')
@section('top_menu', 'projects')

@section('head')
    <title>{{ !empty($project->meta_title)?$project->meta_title:$project->name }}</title>
    <meta name="description" content="{{ $project->description }}" />
    <meta name="keywords" content=" {{ $project->meta_keywords }} " />
    @parent

    <style>
        .first-bottom {
            display: none;
        }
    </style>
@endsection

@section('content')
<div class="page-header wave-end">
    <div class="container wow fadeInLeft">
        @if ($project->cover_image)
        <style>
            .page-header {
                background-image: url('{{ asset('storage/'.$project->cover_image) }}');
                background-repeat: no-repeat;
                background-size: cover;
                background-position: center center;
            }
            .page-header h1 {
                color: #ffffff;
            }
        </style>
        @endif
        <div class="text-center">
                <div class="h1 page title">
                <h1>{{$project->name }}</h1>
                <span class="filigrane">
                    {{ __('VOTRE PROJET') }}
                </span>
            </div>
            <div class="row">
                <div class="col-md-8 offset-md-2">
                    <p>{{ $project->summary or '&nbsp;' }}</p>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="page-content">
    <div class="container">
        <div class="row">
            <div class="col-md-10 offset-md-1">
                {!! $utils->replaceTplVar($project->trend_edito) !!}
            </div>
        </div>
    </div>
</div>

<div class="container regular-projects" style="position:relative">
    @include('front/blocks/regular-slider')
</div>

@endsection


@section('scripts')
    @parent
    <script>
        $(document).ready(function() {

            $(".regular").slick({
                dots: false,
                arrows: false,
                autoplay: false,
                infinite: false,
                slidesToShow: 4,
                slidesToScroll: 1,
                responsive: [
                    {
                        breakpoint: 992,
                        settings: {
                            slidesToShow:3,
                            initialSlide: 2,
                            infinite: false,
                        }
                    },
                    {
                        breakpoint: 768,
                        settings: {
                            centerMode: true,
                            infinite: false,
                            // variableWidth: true,
                            initialSlide: 1,
                            slidesToShow: 2,
                            arrows: true,
                            prevArrow: '',
                            nextArrow: '<img src="../images/slide-items/icons/arrows-slide.png" alt="">',
                            centerPadding: '0px'
                            
                        }
                    },
                    {
                        breakpoint: 640,
                        settings: {
                            centerMode: true,
                            // variableWidth: true,
                            initialSlide: 0,
                            slidesToShow: 1,
                            infinite: false,
                            arrows: true,
                            prevArrow: '',
                            nextArrow: '<img src="../images/slide-items/icons/arrows-slide.png" alt="">',
                            centerPadding: '45px'
                            
                        }
                    },
                    {
                        breakpoint: 480,
                        settings: {
                            arrows: true,
                            centerMode: true,
                            infinite: false,
                            variableWidth: true,
                            initialSlide: 0,
                            slidesToShow: 2,
                            prevArrow: '',
                            nextArrow: '<img src="../images/slide-items/icons/arrows-slide.png" alt="">',
                            centerPadding: '15px'
                        }
                    }
                ]
            });
        });
        </script>
            
@endsection