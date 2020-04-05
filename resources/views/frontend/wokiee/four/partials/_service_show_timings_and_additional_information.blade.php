<div class="tt-collapse-block" style="border: none;">
    @if(!is_null($element->timings))
        <div class="tt-item active">
            <div class="tt-collapse-title">{{ trans('general.duty_timings') }}</div>
            <div class="tt-collapse-content">
                @include('frontend.wokiee.four.partials._service_timings_table',['elements' => $element->timings])
            </div>
        </div>
    @endif
    <div class="tt-item active">
        <div class="tt-collapse-title">{{ trans('general.more_information') }}</div>
        <div class="tt-collapse-content">
            <div class="col-sm-12 col-md-6">
                @include('frontend.wokiee.four.partials._service_more_information')
            </div>

        </div>
    </div>
</div>