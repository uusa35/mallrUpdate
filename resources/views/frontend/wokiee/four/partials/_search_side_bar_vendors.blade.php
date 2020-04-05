@if(isset($vendors) && $vendors->isNotEmpty())
    <div class="tt-collapse open">
        <h3 class="tt-collapse-title">{{ trans('general.companies') }}</h3>
        <div class="tt-collapse-content">
            <ul class="tt-list-row">
                @foreach($vendors as $vendor)
                    <li>
                        <a class="{{ request('user_id') == $vendor->id ? 'text-warning' : null }}"
                                href="{!! request()->fullUrlWithQuery(['user_id' => $vendor->id]) !!}">{{ $vendor->slug }}</a>
                    </li>
                @endforeach
                <li>
                    <a href="{{ getRequestQueryUrlWithout('user_id') }}" class="btn-link-02">{{ trans('general.clear') }}</a>
                </li>
            </ul>
        </div>
    </div>
@endif