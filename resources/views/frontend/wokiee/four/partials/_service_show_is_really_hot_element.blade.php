@if($element->isReallyHot)
    <div class="d-flex justify-content-center">
        <div class="tt-wrapper service-show-is-really-hot-align-center">
            <div class="tt-countdown_box_02">
                <div class="tt-countdown_inner">
                    <div class="tt-countdown really-hot-element"
                         data-date="{{ $element->end_sale->format('Y-m-d') }}"
                         data-year="{{ trans('general.years') }}"
                         data-month="{{ trans('general.months') }}"
                         data-week="{{ trans('general.weeks') }}"
                         data-day="{{ trans('general.days') }}"
                         data-hour="{{ trans('general.hours') }}"
                         data-minute="{{ trans('general.minutes') }}"
                         data-second="{{ trans('general.seconds') }}"></div>
                </div>
            </div>
        </div>
    </div>
@endif
