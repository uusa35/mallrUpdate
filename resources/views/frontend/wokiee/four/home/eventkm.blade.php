@extends('frontend.wokiee.four.layouts.app')

@section('body')
    @include('frontend.wokiee.four.partials._btns_home')
{{--    @if(isset($topDoubleCommercials) && $topDoubleCommercials->isNotEmpty())--}}
{{--        @include('frontend.wokiee.four.partials._commercials_top', ['elements' => $topDoubleCommercials])--}}
{{--    @endif--}}
    @if(isset($newServices) && $newServices->isNotEmpty())
        @include('frontend.wokiee.four.partials._services_slider_sm', ['elements' => $newServices, 'title' => trans('general.recent_services')])
    @endif
{{--    @if(isset($serviceHotDeals) && $serviceHotDeals->isNotEmpty())--}}
{{--        @include('frontend.wokiee.four.partials._services_slider_sm', ['elements' => $serviceHotDeals, 'title' => trans('general.hot_deals')])--}}
{{--    @endif--}}
    @if(isset($newProducts) && $newProducts->isNotEmpty())
        @include('frontend.wokiee.four.partials._products_slider',['title' => trans('general.new_arrivals'), 'elements' => $newProducts])
    @endif
{{--    @if(isset($bottomDoubleCommercials))--}}
{{--        @include('frontend.wokiee.four.partials._commercials_top', ['elements' => $bottomDoubleCommercials])--}}
{{--    @endif--}}
    {{--        @if(!session()->has('day_selected'))--}}
    {{--                @include('frontend.wokiee.four.partials._search_modal_home_page')--}}
    {{--        @endif--}}
    @include('frontend.wokiee.four.partials._country_modal')
@endsection
