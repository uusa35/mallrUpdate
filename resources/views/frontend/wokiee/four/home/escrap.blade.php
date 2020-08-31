@extends('frontend.wokiee.four.layouts.app')

@section('body')
    @include('frontend.wokiee.four.partials.slider')
    @if(isset($categoriesHome) && $categoriesHome->isNotEmpty())
        @include('frontend.wokiee.four.partials.escrap.category._home_categories',['elements' => $categoriesHome])
    @endif
    @if(isset($subCategories) && $subCategories->isNotEmpty())
        @include('frontend.wokiee.four.partials.escrap.category._home_sub_categories',['elements' => $subCategories])
        @endif
    @include('frontend.wokiee.four.partials._btn_info')
    @include('frontend.wokiee.four.partials._country_modal')
@endsection
