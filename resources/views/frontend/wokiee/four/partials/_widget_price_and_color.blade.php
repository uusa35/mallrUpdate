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
