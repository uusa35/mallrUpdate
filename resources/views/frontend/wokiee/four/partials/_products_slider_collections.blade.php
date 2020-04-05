@if($elements->isNotEmpty())
    <div class="container-indent">
        <div class="container-fluid-custom">
            <div class="tt-block-title">
                <h2 class="tt-title">{{ trans('general.best_sale_collections') }}</h2>
                <div class="tt-description">{{ trans('message.hot_deal_products') }}</div>
            </div>
            <div class="tt-carousel-products row arrow-location-tab arrow-location-tab01 tt-alignment-img tt-layout-product-item slick-animated-show-js"
                 data-item="{{ isset($items) ? $items : 4  }}"
            >
                @foreach($elements as $collection)
                    <div class="col-lg-12">
                        <div class="tt-product-listing-masonry">
                            <div class="tt-product-init tt-add-item">
                                @foreach($collection->products->take(5) as $product)
                                    @include('frontend.wokiee.four.partials._product_widget_metro',['element' => $product, 'double' => $loop->first,'collection' => $collection->id])
                                @endforeach
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
@endif


