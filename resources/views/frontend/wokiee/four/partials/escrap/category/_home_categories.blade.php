@if($elements->isNotEmpty())
    <div class="container-indent0">
        <div class="container">
            <div class="tt-block-title">
                <h1 class="tt-title">{{ trans('general.categories') }}</h1>
                {{--                <div class="tt-description">{{ trans('message.recent_products') }}</div>--}}
            </div>
            <div class="row flex-sm-row tt-layout-promo-box">
                @foreach($elements as $element)
                    <div class="col-sm-6">
                        <a href="{{ route('frontend.category.index',['parent_id' => $element->id]) }}"
                           class="tt-promo-box tt-one-child hover-type-2">
                            <img src="{{ asset(env('IMG_LOADER')) }}"
                                 data-src="{{ $element->getCurrentImageAttribute('image', 'large') }}"
                                 class="img-responsive img-category"
                                 alt="{{ $element->caption }}">
                            <div class="tt-description d-none">
                                <div class="tt-description-wrapper">
                                    <div class="tt-background"></div>
                                    <div class="tt-title-small">{{ $element->name }}</div>
                                    <div class="tt-title-small">{{ $element->caption }}</div>
                                </div>
                            </div>
                        </a>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
@endif
