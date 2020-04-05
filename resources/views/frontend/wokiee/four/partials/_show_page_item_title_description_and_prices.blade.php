<h1 class="tt-title tt-title-border">
    {{ $element->name }}
</h1>
<div class="tt-price tt-title-border">
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
<div class="tt-wrapper">
    {{ $element->description }}
</div>