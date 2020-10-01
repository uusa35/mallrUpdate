@extends('frontend.wokiee.four.layouts.app')

@section('body')
    @include('frontend.wokiee.four.partials.slider')
    @include('frontend.wokiee.four.partials._classified_categories_slider',['title' => trans('general.categories'), 'elements' => $categoriesHome])
    @include('frontend.wokiee.four.partials._users_slider',['title' => trans('general.some_companies'), 'elements' => $companies])
{{--    @include('frontend.wokiee.four.partials._btn_info')--}}
    @include('frontend.wokiee.four.partials._country_modal')
@endsection
