@if($elements->isNotEmpty())
    <div class="container-indent">
        <div class="container container-fluid-custom-mobile-padding">
            <div class="tt-block-title">
                <h2 class="tt-title">{{ trans('general.sub_categories') }}</h2>
{{--                <div class="tt-description">{{ trans('message.brands_on_home_page') }}</div>--}}
            </div>
            <div class="row tt-img-box-listing">
                @foreach($elements as $element)
                    <div class="col-6 col-lg-3">
                    <div class="tt-product thumbprod-center" style="padding: 10px;">
                        <div class="tt-image-box">
                            <a href="{{ route('frontend.user.search', ['category_id' => $element->category_id]) }}">
                                @include('frontend.wokiee.four.partials._widget_tags_and_images')
                            </a>
                        </div>
                        @include('frontend.wokiee.four.partials._category_widget_description')
                    </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
@endif


