@if(isset($element) && $element)
</br>
</br>
<div class="tt-block-title">
    <h1 class="tt-title">{{ $element->name }}</h1>
    <h6 >{{ trans('general.views_no') }} : {{ $element->views }}</h6>
</div>
<div class="tt-product-listing-masonry">
    <div class="tt-product-init tt-add-item">
        <div class="col-lg-12">
            @if(isset($element) && $element->products->isNotEmpty())
                @foreach($element->products->take(5) as $product)
                    @include('frontend.wokiee.four.partials._product_widget_metro',['element' => $product, 'double' => $loop->first,'collection_id' => $element->id])
                @endforeach
            @endif
        </div>
    </div>
</div>
@endif
