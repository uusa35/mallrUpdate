@extends('frontend.wokiee.four.layouts.app')

@section('body')
    @if(env('BITS'))
        @include('frontend.wokiee.four.partials.slider')
        @if(isset($newProducts))
            @include('frontend.wokiee.four.partials._products_slider',['title' => trans('general.new_arrivals'), 'elements' => $newProducts])
        @endif

    @elseif(env('MALLR'))
        @include('frontend.wokiee.four.partials.slider')
        @include('frontend.wokiee.four.partials._all_brands')
        @if(isset($bestSaleCollections) && $bestSaleCollections->isNotEmpty())
            {{--                        @include('frontend.wokiee.four.partials._products_metro_collection',['element' => $bestSaleCollections->first(), 'title' => trans('general.our_selection_from_collections')])--}}
            {{--            @include('frontend.wokiee.four.partials._products_slider_collections',['elements' => $bestSaleCollections, 'title' => trans('general.our_selection_from_collections'), 'items' => 2])--}}
            @include('frontend.wokiee.four.partials._collection_slider_with_cover',['title' => trans('general.our_selection_from_collections'), 'elements' => $bestSaleCollections])
        @endif
        @if(isset($designers) && $designers->isNotEmpty())
            @include('frontend.wokiee.four.partials._users_slider',['title' => trans('general.our_personal_shoppers'), 'elements' => $designers])
            @if(isset($companies) && $companies->isNotEmpty())
                @include('frontend.wokiee.four.partials._users_slider',['title' => trans('general.some_companies'), 'elements' => $companies])
            @endif
        @endif
        @if(isset($newProducts) && $newProducts->isNotEmpty())
            @include('frontend.wokiee.four.partials._products_slider',['title' => trans('general.new_arrivals'), 'elements' => $newProducts])
        @endif
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

    @elseif(env('EVENTKM'))
        @include('frontend.wokiee.four.partials._btns_home')
        @if(isset($topDoubleCommercials) && $topDoubleCommercials->isNotEmpty())
            @include('frontend.wokiee.four.partials._commercials_top', ['elements' => $topDoubleCommercials])
        @endif
        @if(isset($newServices) && $newServices->isNotEmpty())
            @include('frontend.wokiee.four.partials._services_slider_sm', ['elements' => $newServices, 'title' => trans('general.recent_services')])
        @endif
        @if(isset($serviceHotDeals) && $serviceHotDeals->isNotEmpty())
            @include('frontend.wokiee.four.partials._services_slider_sm', ['elements' => $serviceHotDeals, 'title' => trans('general.hot_deals')])
        @endif
        @if(isset($newProducts) && $newProducts->isNotEmpty())
            @include('frontend.wokiee.four.partials._products_slider',['title' => trans('general.new_arrivals'), 'elements' => $newProducts])
        @endif
        @if(isset($bottomDoubleCommercials))
            @include('frontend.wokiee.four.partials._commercials_top', ['elements' => $bottomDoubleCommercials])
        @endif
        {{--        @if(!session()->has('day_selected'))--}}
        {{--                @include('frontend.wokiee.four.partials._search_modal_home_page')--}}
        {{--        @endif--}}
    @endif
    @include('frontend.wokiee.four.partials._country_modal')
@endsection
