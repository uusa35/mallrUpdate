<div class="tt-wrapper">
        <div class="tt-title text-center">
                {{ $element->name }}
        </div>
        <div class="tt-price">
                @if($element->isOnSale)
                        <span class="new-price">{{ $element->convertedSalePrice}}
                                {{ $currency->symbol }}</span>
                        {{--        <span class="old-price">{{ $element->convertedPrice }}--}}
                        {{--            {{ $currency->symbol }}</span>--}}
                @else
                        <span class="new-price">{{ $element->convertedPrice }}
                                {{ $currency->symbol }}</span>
                @endif
        </div>
</div>
<div class="tt-wrapper">
    {{ $element->description }}
</div>
