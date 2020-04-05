<ul>
    <li>
        <strong class="border-bottom">{{ trans('general.country') }}</strong>
    </li>
    @foreach($countries as $country)
        <li class="{{ getCurrentCountrySessionId() === $country->id ? 'active' : null  }}">
            <a href="{{ route('frontend.country.set',['country_id' => $country->id]) }}">
                <img class="img-responsive img-xxs" src="{{ $country->imageThumbLink }}"
                     alt="{{ $country->slug }}">
                {{ $country->slug }}</a>
        </li>
    @endforeach
</ul>