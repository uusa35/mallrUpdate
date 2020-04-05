@if(isset($colors) && $colors->isNotEmpty())
    <div class="tt-collapse open">
        <h3 class="tt-collapse-title">{{ trans('general.filter_by_colors') }}</h3>
        <div class="tt-collapse-content">
            <ul class="tt-options-swatch options-middle">
                @foreach($colors as $color)
                    <a href="{!! request()->fullUrlWithQuery(['color_id' => $color->id]) !!}">
                        <i style="color : {{ $color->code }};"
                           class="fa fa-fw {{ request('color_id') == $color->id ? 'fa-circle-o' : 'fa-circle' }} fa-2x"></i>
                    </a>
                @endforeach
            </ul>
        </div>
    </div>
@endif