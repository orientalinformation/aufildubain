@inject('utils', 'App\Services\UtilsService')
@inject('categories', 'App\Services\CategoriesService')

@foreach($products as $product)

<?php
    $image = json_decode($product->images);
    $image = (!empty($image[0]))?'storage/'.$image[0]:'/images/no-image.png';

    $subCategory = $categories->getId($product->category_id);

    if (!empty($subCategory)):

        if (!file_exists(public_path($image))) {
            $image = '/images/no-image.png';
        } 

        if ($subCategory->parent_id) {
            $category = $categories->getId($subCategory->parent_id);
        } else {
            $category = $subCategory;
        }
?>
        <div class="pgrid-item ">
                @if ($category->id == $subCategory->id)
                <a href="{{ route('subCategory.view', [$subCategory->slug, $product->slug ]) }}">
                @else
                <a href="{{ route('product.view', [$category->slug, $subCategory->slug, $product->slug]) }}">
                @endif
                <div class="product">
                    <div class="top-item">
                        <img src="{{ asset($image) }}" class="img-product" alt="{{$product->slug}}" /> @if ($product->brandId)
                        <div class="img_brand">
                            <img src="{{ asset('storage/'.$product->brandId->image) }}" alt="{{$product->brandId->slug}}">
                        </div>
                        @endif
                        <div class="img-hover"></div>
                    </div>
                    <div class="bot-item">
                        <h4 class="title-item">
                        {!! $utils->replaceTplVar($product->grip) !!}</h4>
                        <div class="ct-btn-arrow">
                            @if ($category->id == $subCategory->id)
                                <a href="{{ route('subCategory.view', [$subCategory->slug, $product->slug ]) }}" class="btn-arrow" tabindex="0"><img src="/images/slide-items/icons/arrows-slide.png" alt=""></a>
                            @else
                                <a href="{{ route('product.view', [$category->slug,$subCategory->slug, $product->slug ]) }}" class="btn-arrow" tabindex="0"><img src="/images/slide-items/icons/arrows-slide.png" alt=""></a>
                            @endif
                        </div>
                    </div>
                </div>
            </a>
        </div>
    <?php endif; ?>
@endforeach