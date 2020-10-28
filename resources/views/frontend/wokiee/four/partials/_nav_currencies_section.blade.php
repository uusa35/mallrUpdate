<ul>
    <li>
        <strong class="border-bottom">{{ trans('general.currency') }}</strong>
    </li>
    @foreach($currencies as $currency)
        <li class="{{ getCurrencySymbol() === $currency->currency_symbol_en ? 'active' : null  }}">
            <a href="{{ route('frontend.currency.change',['currency' => strtolower($currency->currency_symbol_en)]) }}">
                <img class="img-responsive img-xs"
                     src="{{ $currency->country->imageThumbLink ? $currency->country->imageThumbLink : asset('images/flags/'.$currency->country->currency_symbol_en) }}" alt="{{ $currency->name }}">
                {{ $currency->name }}
            </a></li>
    @endforeach
</ul>
