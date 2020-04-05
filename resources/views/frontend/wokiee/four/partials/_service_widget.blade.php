<div class="tt-product thumbprod-center">
    <div class="tt-image-box">
        <a href="#" class="tt-btn-quickview" data-toggle="modal"
           data-target="#ModalquickView"
           data-name="{{ $element->name }}"
           data-id="{{ $element->id }}"
           data-image="{{ $element->imageLargeLink }}"
           data-description="{{ $element->description }}"
           data-sku="{{ $element->sku }}"
           data-price="{{ $element->convertedFinalPrice }}"
           data-currency-name="{{ $currency->symbol }}"
           data-url="{{ route('frontend.service.show.name', ['id' => $element->id, 'name' => $element->name]) }}"
           data-tooltip="{{ trans('general.quick_view') }}"
           data-tposition="{{ app()->isLocale('ar') ? 'right' : 'left' }}"
        ></a>
        @auth
            <a href="{{ route('frontend.favorite.service.add', $element->id) }}" class="tt-btn-wishlist" data-tooltip="{{ trans('general.add_to_wish_list') }}"
               data-tposition="{{ app()->isLocale('ar') ? 'right' : 'left' }}"
            ></a>
        @endauth
        {{--<a href="#" class="tt-btn-compare" data-tooltip="Add to Compare"--}}
        {{--data-tposition="{{ app()->isLocale('ar') ? 'right' : 'left' }}"--}}
        {{--></a>--}}
        <a href="{{ route('frontend.service.show.name', ['id' => $element->id, 'name' => $element->name]) }}">
            @include('frontend.wokiee.four.partials._widget_tags_and_images')
        </a>
        @if($element->isReallyHot)
            @include('frontend.wokiee.four.partials._widget_is_really_hot')
        @endif
    </div>
    <div class="tt-description">
        <div class="tt-row">
            <ul class="tt-add-info">
                <li>
                    <a href="{{ route('frontend.service.search',['user_id' => $element->user_id]) }}">
                        {{ $element->user->slug }}
                    </a>
                </li>
            </ul>
            {{--@include('frontend.wokiee.four.partials._rating')--}}
        </div>
        <h2 class="tt-title">
            <a href="{{ route('frontend.service.show.name',['id' => $element->id , 'name' => $element->name ]) }}">{{ $element->name }}</a>
        </h2>
        {{--@include('frontend.wokiee.four.partials._widget_price_and_color')--}}
        <div class="tt-product-inside-hover">
            {{--<div class="tt-row-btn">--}}
            {{--<a href="{{ route('frontend.product.show', $element->id) }}"--}}
            {{--class="tt-btn-addtocart thumbprod-button-bg" data-toggle="modal"--}}
            {{--data-target="#modalAddToCartProduct">{{ trans('general.view') }}</a>--}}
            {{--</div>--}}
            <div class="tt-row-btn">
                <a href="{{ route('frontend.service.show.name',['id' => $element->id, 'name' => $element->name ]) }}"
                   class="btn btn-small">{{ trans('general.view_details') }}</a>
            </div>
            <div class="tt-row-btn">
                <a href="#" class="tt-btn-quickview" data-toggle="modal"
                   data-target="#ModalquickView"
                   data-tooltip="{{ trans('general.quick_view') }}"
                   data-tposition="{{ app()->isLocale('ar') ? 'right' : 'left' }}"
                   data-name="{{ $element->name }}"
                   data-id="{{ $element->id }}"
                   data-image="{{ $element->imageLargeLink }}"
                   data-description="{{ $element->description }}"
                   data-sku="{{ $element->sku }}"
                   data-price="{{ $element->convertedFinalPrice }}"
                   data-currency-name="{{ $currency->symbol }}"
                   data-url="{{ route('frontend.service.show.name', ['id' => $element->id, 'name' => $element->name]) }}"
                ></a>
                @auth
                    <a href="#" class="tt-btn-wishlist"></a>
                @endauth
                {{--<a href="#" class="tt-btn-compare"></a>--}}
            </div>
        </div>
    </div>
</div>