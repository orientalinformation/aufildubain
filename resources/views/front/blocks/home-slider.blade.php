@inject('slidesrv', 'App\Services\SlidesService')

<?php
$slides = $slidesrv->all();
?>

@if ($slides)
<div class="slider wave-end" id="Homeslider">
    <div class="slider-wrapper">
        @foreach ($slides as $slide)
        <?php $images = json_decode($slide->image); ?>
        @if (is_array($images) && count($images)>0)
        <a href="{{$slide->btn_link}}">
            <img src="{{ asset('storage/'.$images[0]) }}" class="slide" alt="{{$slide->image_alt}}">
        </a>
        @endif
        @endforeach
    </div>
    
</div>
@endif