@extends('frontend.wokiee.four.layouts.app')

@section('body')

    @if($sliders->isNotEmpty())
        @include('frontend.wokiee.four.partials.slider')
    @endif
    @if(isset($newProducts))
        @include('frontend.wokiee.four.partials._products_slider',['title' => trans('general.new_arrivals'), 'elements' => $newProducts])
    @endif

    @include('frontend.wokiee.four.partials._all_brands')

    @if(isset($onSaleProducts) && $onSaleProducts->isNotEmpty())
        @include('frontend.wokiee.four.partials._products_slider',['title' => trans('general.on_sale_products'), 'elements' => $newProducts])
    @endif
    {{--        @if(isset($categoriesHome) && $categoriesHome->isNotEmpty())--}}
    {{--            @include('frontend.wokiee.four.partials._five_categories',['elements' => $categoriesHome])--}}
    {{--        @endif--}}
    {{--        @if(isset($tripleCommercials) && $tripleCommercials->isNotEmpty())--}}
    {{--            @include('frontend.wokiee.four.partials._horizontal_three_categories',['elements' => $tripleCommercials])--}}
    {{--        @endif--}}
    @if(isset($productHotDeals) && $productHotDeals->isNotEmpty())
        @include('frontend.wokiee.four.partials._products_slider_hot_deal', ['elements' => $productHotDeals,'items' => 3])
    @endif
    @include('frontend.wokiee.four.partials._btn_info')

    @include('frontend.wokiee.four.partials._country_modal')
@endsection
