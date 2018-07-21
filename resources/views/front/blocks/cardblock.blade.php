<div class="card {{ $classes or '' }}" {{ $attr or '' }}>
    <div class="card-top">
        <img class="card-img-top" src="{{ $image or '' }}" alt="{{ $image_alt or '' }}">
        {!! $card_top or '' !!}
    </div>
    <div class="card-body">
        <h3 class="card-title">{{ $title or '' }}</h3>
        {{ $slot }}
    </div>
</div>