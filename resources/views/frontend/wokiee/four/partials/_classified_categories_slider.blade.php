@if(isset($elements) && $elements->isNotEmpty())
    <div class="container-indent">
        <div class="container container-fluid-custom-mobile-padding">
            @if(isset($title))
                <div class="tt-block-title">
                    <h1 class="tt-title">

                        <a href="{{ route('frontend.category.index') }}" class="url-normal">{{ $title }}</a>
                    </h1>
                    {{--                    <div class="tt-description">{{ trans('message.our_designers') }}</div>--}}
                </div>
            @endif
            <div class="tt-carousel-products row arrow-location-tab arrow-location-tab01 tt-alignment-img tt-layout-product-item slick-animated-show-js"
                 data-item="{{ isset($items) ? $items : 4  }}"
            >
                @foreach($elements->where('is_classified',true)->where('is_parent', false)->where('on_home', true) as $element)
                    <div class="col-lg-3 col-sm-12">
                        @include('frontend.wokiee.four.partials._classified_category_widget',['element' => $element])
                    </div>
                @endforeach
            </div>
        </div>
    </div>
@endif
