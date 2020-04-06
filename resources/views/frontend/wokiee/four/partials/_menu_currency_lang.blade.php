<div class="tt-desctop-parent-multi tt-parent-box">
    <div class="tt-multi-obj tt-dropdown-obj">
        <button class="tt-dropdown-toggle" data-tooltip="Settings" data-tposition="bottom"><i class="icon-f-79"></i>
        </button>
        <div class="tt-dropdown-menu">
            <div class="tt-mobile-add">
                <button class="tt-close">{{ trans('general.close') }}</button>
            </div>
            <div class="tt-dropdown-inner">
                {{--                @include('frontend.wokiee.four.partials._nav_countries_section')--}}
                @include('frontend.wokiee.four.partials._nav_langauge_section')
                @if(isset($currencies))
                    @include('frontend.wokiee.four.partials._nav_currencies_section')
                @endif
            </div>
        </div>
    </div>
</div>