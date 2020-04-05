@if(isset($sizes) && $sizes->isNotEmpty())
    <div class="tt-collapse open">
        <h3 class="tt-collapse-title">{{ trans('general.filter_by_sizes') }}</h3>
        <div class="tt-collapse-content">
            <ul class="tt-options-swatch options-middle">
                @if(isset($sizes) && $sizes->isNotEmpty())
                    @foreach($sizes as $size)
                        <a class="badge {{ request('size_id') == $size->id ? 'badge-info' : 'badge-light'}}"
                           style="font-size: medium; margin: 3px;"
                           href="{!! request()->fullUrlWithQuery(['size_id' => $size->id]) !!}">
                            {{ $size->name }}
                        </a>
                    @endforeach
                @endif
            </ul>
        </div>
    </div>
@endif