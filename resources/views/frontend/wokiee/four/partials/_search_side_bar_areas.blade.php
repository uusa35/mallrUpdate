@if(isset($areas) && $areas->isNotEmpty())
    <div class="tt-collapse open">
        <h3 class="tt-collapse-title">{{ trans('general.filter_by_areas') }}</h3>
        <div class="tt-collapse-content">
            <ul class="tt-list-row">
                @foreach($areas->where('country_id', getCurrentCountrySessionId()) as $area)
                    <li>
                        <a class="{{ request('area_id') == $area->id ? 'text-warning' : null }}"
                                href="{!! request()->fullUrlWithQuery(['area_id' => $area->id]) !!}">{{ $area->slug }}</a>
                    </li>
                @endforeach
            </ul>
        </div>
    </div>
@endif