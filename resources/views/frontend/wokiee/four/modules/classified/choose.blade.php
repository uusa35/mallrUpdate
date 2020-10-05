@extends('frontend.wokiee.four.layouts.app')

@section('breadcrumbs')
    {{ Breadcrumbs::render('frontend.category.index') }}
@endsection

@section('body')
    <div class="container-indent nomargin">
        {{--<div class="container-fluid-custom container-fluid-custom-mobile-padding">--}}
        <div class="container-indent">
            {{--<div class="container container-fluid-custom-mobile-padding">--}}
            <div class="container">
                <div class="row" style="padding-top: 20px;">
                    <div class="col-md-12">
                        <div class="content-indent">
                            </br>
                            <div class="tt-product-listing row">
                                @if(isset($elements) && $elements->isNotEmpty())
                                    <div class="row">
                                        @foreach($elements as $element)
                                            <div class="col-6 col-lg-3">
                                                <div class="tt-product thumbprod-center" style="padding: 10px;">
                                                    <div class="tt-image-box">
                                                            <a href="{{ route('frontend.classified.create', ['classified_category_id' => $element->id]) }}">
                                                                @include('frontend.wokiee.four.partials._widget_tags_and_images')
                                                            </a>
                                                    </div>
                                                    @include('frontend.wokiee.four.partials._category_widget_description')
                                                </div>

                                            </div>
                                        @endforeach
                                    </div>
                                @endif

                            </div>
                            <div class="text-center tt_product_showmore">
{{--                                <div class="col-lg-12">--}}
{{--                                    @include('frontend.wokiee.four.partials._pagination',['elements' => $elements])--}}
{{--                                </div>--}}
                                {{--<a href="#" class="btn btn-border">LOAD MORE</a>--}}
                                {{--<div class="tt_item_all_js">--}}
                                {{--<a href="#" class="btn btn-border01">NO MORE ITEM TO SHOW</a>--}}
                                {{--</div>--}}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        {{--</div>--}}
        {{--</div>--}}
{{--        @if(!request()->has('categories') || !request()->has('service_category_id') && env('EVENTKM') && $categoriesList && $vendors)--}}
{{--            @include('frontend.wokiee.four.partials._search_modal_categories')--}}
{{--        @endif--}}
    </div>
@endsection
