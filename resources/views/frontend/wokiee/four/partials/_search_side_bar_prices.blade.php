<div class="tt-collapse open">
    <h3 class="tt-collapse-title">{{ trans('general.filter_by_price') }}</h3>
    <div class="tt-collapse-content">
        <ul class="tt-list-row">
            <li class=""><a href="{{ request()->fullUrlWithQuery(['min' => 0, 'max' => 10]) }}">0 — 10 {{ $currency->symbol }} </a></li>
            <li class=""><a href="{{ request()->fullUrlWithQuery(['min' => 10, 'max' => 20]) }}">10 — 20 {{ $currency->symbol }} </a></li>
            <li class=""><a href="{{ request()->fullUrlWithQuery(['min' => 20, 'max' => 30]) }}">20 — 30 {{ $currency->symbol }} </a></li>
            <li class=""><a href="{{ request()->fullUrlWithQuery(['min' => 30, 'max' => 50]) }}">30 — 50 {{ $currency->symbol }} </a></li>
            <li class=""><a href="{{ request()->fullUrlWithQuery(['min' => 50, 'max' => 100]) }}">50 — 100 {{ $currency->symbol }} </a></li>
            <li class=""><a href="{{ request()->fullUrlWithQuery(['min' => 100, 'max' => 150]) }}">100 — 150 {{ $currency->symbol }} </a></li>
            @if(!env('NASHKW'))
            <li class=""><a href="{{ request()->fullUrlWithQuery(['min' => 150, 'max' => 200]) }}">150 — 200 {{ $currency->symbol }} </a></li>
            <li class=""><a href="{{ request()->fullUrlWithQuery(['min' => 200, 'max' => 250]) }}">200 — 250 {{ $currency->symbol }} </a></li>
            @endif
        </ul>
    </div>
</div>
