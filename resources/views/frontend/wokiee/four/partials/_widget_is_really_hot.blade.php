<div class="tt-countdown_box d-none d-md-block">
    <div class="tt-countdown_inner">
        <div class="tt-countdown"
             data-date="{{ $element->end_sale->format('Y-m-d') }}"
             data-year="{{ trans('general.years') }}"
             data-month="{{ trans('general.months') }}"
             data-week="{{ trans('general.weeks') }}"
             data-day="{{ trans('general.days') }}"
             data-hour="{{ trans('general.hours') }}"
             data-minute="{{ trans('general.minutes') }}"
             data-second="{{ trans('general.seconds') }}"
        ></div>
    </div>
</div>