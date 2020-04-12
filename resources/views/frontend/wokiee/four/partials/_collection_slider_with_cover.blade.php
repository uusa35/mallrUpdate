<div class="container-indent">
    <div class="container container-fluid-custom-mobile-padding">
        @if($title)
            <div class="tt-block-title">
                <h1 class="tt-title">{{ trans('general.best_sale_collections') }}</h1>
                <div class="tt-description">{{ trans('message.best_sale_collections') }}</div>
            </div>
        @endif
        <div class="tt-carousel-products row arrow-location-tab arrow-location-tab01 tt-alignment-img tt-layout-product-item slick-animated-show-js"
             data-item="{{ isset($items) ? $items : 4  }}"
        >
            @foreach($elements as $element)
                @if($element && $element->active && $element->user->active)
                    <div class="col-lg-3 col-sm-12">
                        @include('frontend.wokiee.four.partials._collection_widget_cover',['element' => $element,'title' => trans('general.personal_shopper')])
                    </div>
                @endif
            @endforeach
        </div>
    </div>
</div>
