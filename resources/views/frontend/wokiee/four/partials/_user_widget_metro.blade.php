@if($element)
    <div class="element-item {{ isset($double) && $double ? 'double-size hidden-xs' : null }}">
        <div class="tt-product-design02 thumbprod-center">
            <div class="tt-image-box">
                <a href="product.html">
                    <span class="tt-img"><img src="{{ $element->imageThumbLink }}" alt="{{ $element->slug }}"></span>
                </a>
            </div>
            @include('frontend.wokiee.four.partials._product_widget_description', ['collection' => true])
        </div>
    </div>
@endif