<div class="tt-price">
    @if($element->isOnSale)
        <span class="new-price pull-left">{{ $element->convertedSalePrice}}<span>{{ $currency->symbol }}</span></span>
        <span class="old-price d-md-block pull-right">{{ $element->convertedPrice }}<span>{{ $currency->symbol }}</span></span>
    @else
        <span class="sale-price">{{ $element->convertedPrice }}<span>{{ $currency->symbol }}</span></span>
    @endif
</div>
@if($element->hasRealAttributes)
    <div class="tt-option-block">
        {{--<ul class="tt-options-swatch">--}}
        {{--@foreach($element->product_attributes as $productAttribute)--}}
        {{--<li><a href="#">{{ $productAttribute->size->name }}</a></li>--}}
        {{--@endforeach--}}
        {{--</ul>--}}
        <ul class="tt-options-swatch">
            @foreach($element->product_attributes->pluck('color')->unique('id') as $color)
                <li><a class="options-color" style="background-color: {{ $color->code }};"
                       href="#"></a></li>
            @endforeach
        </ul>
    </div>
    <div class="tt-option-block">
        <ul class="tt-options-swatch js-change-img">
            @foreach($element->product_attributes->pluck('size')->unique('id')->take(4) as $size)
            <li><a href="#" class="options-color-img"
                   data-src="images/product/product-03-05.jpg" data-src-hover="images/product/product-03-05-hover.jpg"
                   data-tooltip="{{ $size->name }}" data-tposition="top">
                    <h5 style="color : lightgrey; padding-top: 5px">{{ strtoupper(substr($size->name,0,2)) }}</h5>
                </a>
            </li>
                @endforeach
        </ul>
    </div>
@elseif($element->show_attribute)
    <div class="tt-option-block">
        {{--<ul class="tt-options-swatch">--}}
        {{--@foreach($element->product_attributes as $productAttribute)--}}
        {{--<li><a href="#">{{ $productAttribute->size->name }}</a></li>--}}
        {{--@endforeach--}}
        {{--</ul>--}}
        <ul class="tt-options-swatch">
            <li><a class="options-color" style="background-color: {{ $element->color->code }};"
                   href="#"></a></li>
        </ul>
    </div>
@endif
