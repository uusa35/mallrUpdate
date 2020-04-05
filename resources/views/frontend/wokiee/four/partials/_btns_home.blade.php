<div class="row">
    <div class="col">
    </div>
    <div class="col-12" style="padding: 50px;">
        <div class="tt-offset-small container-indent element-padding-bottom">
            <div class="container-fluid-custom">
                <div class="row justify-content-md-center">

                        <div class="col-lg-4 col-sm-12">
                            <a href="{{ route('frontend.category.index') }}" class="tt-promo-box" style="background-color: transparent !important;">
                                <img src="{{ app()->isLocale('ar') ? asset('img/event-01.jpg') : asset('img/event-01-en.jpg')}}"
                                     data-src="{{ app()->isLocale('ar') ? asset('img/event-01.jpg') : asset('img/event-01-en.jpg')}}"
                                     alt="{{ $settings->company }}"
                                     class=""
                                >
{{--                                <div class="tt-description">--}}
{{--                                    <div class="tt-description-wrapper">--}}
{{--                                        <div class="tt-background" style="background-color: transparent"></div>--}}
{{--                                        <div class="tt-title-large">{{ trans('general.create_event') }}</div>--}}
{{--                                        <div class="tt-title-small">{{ trans('message.create_event') }}</span>--}}
{{--                                        </div>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
                            </a>
                        </div>
                    <div class="col-lg-4 col-sm-12">
                        <a href="{{ route('frontend.service.search',['on_sale' => true]) }}" class="tt-promo-box">
                            <img src="{{ app()->isLocale('ar') ? asset('img/event-02.jpg') : asset('img/event-02-en.jpg') }}"
                                 data-src="{{ app()->isLocale('ar') ? asset('img/event-02.jpg') : asset('img/event-02-en.jpg') }}"
                                 alt="{{ $settings->company }}"
                                 class=""
                            >
{{--                            <div class="tt-description">--}}
{{--                                <div class="tt-description-wrapper">--}}
{{--                                    <div class="tt-background" style="background-color: transparent"></div>--}}
{{--                                    <div class="tt-title-large">{{ trans('general.offers') }}</div>--}}
{{--                                    <div class="tt-title-small">{{ trans('message.offers_home_message') }}</span>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                            </div>--}}
                        </a>
                    </div>
                    <div class="col-lg-4 col-sm-12">
                        <a href="{{ route('frontend.user.index',['type' => 'is_company']) }}" class="tt-promo-box">
                            <img src="{{ app()->isLocale('ar') ? asset('img/event-03.jpg') : asset('img/event-03-en.jpg')}}"
                                 data-src="{{ app()->isLocale('ar') ? asset('img/event-03.jpg') : asset('img/event-03-en.jpg')}}"
                                 alt="{{ $settings->company }}"
                                 class=""
                            >
{{--                            <div class="tt-description">--}}
{{--                                <div class="tt-description-wrapper">--}}
{{--                                    <div class="tt-background" style="background-color: transparent"></div>--}}
{{--                                    <div class="tt-title-large">{{ trans('general.designers') }}</div>--}}
{{--                                    <div class="tt-title-small">{{ trans('message.designers_home_message') }}</span>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                            </div>--}}
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col">
    </div>
</div>