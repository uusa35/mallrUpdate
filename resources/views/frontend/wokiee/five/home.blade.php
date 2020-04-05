@extends('frontend.wokiee.five.layouts.app')

@section('body')
    @include('frontend.wokiee.five.partials.slider')
    @include('frontend.wokiee.five.partials._three_main_categories')
    @include('frontend.wokiee.five.partials._products_slider')
    @include('frontend.wokiee.five.partials._tow_main_categories')
    @include('frontend.wokiee.five.partials._products_slider_hot_deal')
    @include('frontend.wokiee.five.partials._horizontal_three_categories')
    @include('frontend.wokiee.five.partials._btn_info')
@endsection
