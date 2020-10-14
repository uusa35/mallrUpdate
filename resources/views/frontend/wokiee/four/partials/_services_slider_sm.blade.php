<div class="container-indent">
    <div class="container container-fluid-custom-mobile-padding">
        @if(isset($title))
            <div class="tt-block-title">
                <h2 class="tt-title">{{ $title }}</h2>
                @if(isset($message))
                    <div class="tt-description">{{ trans('message.hot_deal_services') }}</div>
                @endif
            </div>
        @endif
        <div class="tt-carousel-products row arrow-location-tab arrow-location-tab01 tt-alignment-img tt-layout-product-item slick-animated-show-js"
             data-item='{{ isset($item) ? $item : 5 }}'
        >
            @foreach($elements as $element)
                <div class="col-2 col-md-4 col-lg-3">
                    @include('frontend.wokiee.four.partials._service_widget',['element' => $element])
                </div>
            @endforeach
        </div>
    </div>
</div>
