@if(isset($services) && $services->isNotEmpty() || isset($products) && $products->isNotEmpty())
    <div class="col-md-4 col-lg-3 col-xl-3 leftColumn aside">
        @include('frontend.wokiee.four.partials._search_side_bar')
    </div>
    <div class="col-md-9">
        <div class="content-indent">
            </br>
            <div class="tt-filters-options desctop-no-sidebar">
                {{--<div class="tt-btn-toggle">--}}
                {{--<a href="#">{{ trans('general.filter') }}</a>--}}
                {{--</div>--}}

                @include('frontend.wokiee.four.partials._search_sort_by')
            </div>
            <div class="tt-product-listing row">
                @if(isset($services) && $services->isNotEmpty())
                    @include('frontend.wokiee.four.partials._services_user_show')
                @endif
                @if(isset($products) && $products->isNotEmpty())
                    @include('frontend.wokiee.four.partials._products_user_show')
                @endif
            </div>
            <div class="text-center tt_product_showmore">
                <div class="col-lg-12">
                    @if(isset($products) && $products->isNotEmpty())
                        @include('frontend.wokiee.four.partials._pagination',['elements' => $products])
                    @endif
                    @if(isset($services) && $services->isNotEmpty())
                        @include('frontend.wokiee.four.partials._pagination',['elements' => $services])
                    @endif
                </div>
                {{--<a href="#" class="btn btn-border">LOAD MORE</a>--}}
                {{--<div class="tt_item_all_js">--}}
                {{--<a href="#" class="btn btn-border01">NO MORE ITEM TO SHOW</a>--}}
                {{--</div>--}}
            </div>
        </div>
    </div>
@endif