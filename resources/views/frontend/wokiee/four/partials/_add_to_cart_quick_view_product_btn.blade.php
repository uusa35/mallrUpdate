<a href="#" class="tt-btn-quickview" data-toggle="modal"
   data-target="#addToCart-{{ $element->id }}"
   data-tooltip="{{ trans('general.quick_view') }}"
   data-tposition="{{ app()->isLocale('ar') ? 'right' : 'left' }}"
   data-name="{{ $element->name }}"
   data-id="{{ $element->id }}"
   data-image="{{ $element->imageLargeLink }}"
   data-notes="{{ $element->notes }}"
   data-description="{{ $element->description }}"
   data-sku="{{ $element->sku }}"
   data-qty="{{ $element->availableQty }}"
   data-price="{{ $element->convertedFinalPrice }}"
   data-currency-name="{{ $currency->symbol }}"
   @if($element->has_attributes && $element->product_attributes->filter()->isNotEmpty())
   data-colors="@foreach($element->product_attributes->pluck('colors')->unique()->filter() as $col) {!! $col->name !!}, @endforeach"
   data-sizes="@foreach($element->product_attributes->pluck('size')->unique()->filter() as $size) {!! $size->name !!}, @endforeach"
   @else
   @if($element->color)
   data-colors="{!! $element->color->name !!}"
   data-sizes="{!! $element->size->name !!}"
   @endif
   @endif
   data-url="{{ route('frontend.product.show.name', ['id' => $element->id, 'name' => $element->name]) }}"
></a>
<div class="modal  fade" id="addToCart-{{ $element->id }}" tabindex="-1" role="dialog" aria-label="myModalLabel"
     aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content " style="max-height: 900px;">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true"><span
                            class="icon icon-clear"></span></button>
            </div>
            <div class="modal-body">
                <div class="tt-modal-quickview desctope">
                    <div class="row">
                        <div class="col-4 hidden-xs">
                            @include('frontend.wokiee.four.partials._service_show_gallery')
                        </div>
                        <div class="col-8">
                            <div class="tt-product-single-info">
                                @include('frontend.wokiee.four.partials._show_tags')
                                @include('frontend.wokiee.four.partials._show_page_item_title_description_and_prices')
                                @include('frontend.wokiee.four.partials._service_show_is_really_hot_element')

                                @if($element->canOrder)
                                    <div class="tt-swatches-container">
                                        <div class="tt-wrapper product-information-buttons text-center">
                                            <a data-toggle="modal" data-target="#modalProductInfo" href="#">
                                        <span class="align-content-center">
                                            <i class="fa fa-fw fa-lg icon-e-75"></i>
                                            <span>
                                        {{ trans('general.size_guide') }}
                                            </span>
                                        </span>
                                            </a>
                                            <a data-toggle="modal" data-target="#modalProductInfo-02" href="#">
                                        <span>
                                            <i class="fa fa-fw fa-lg icon-f-48"></i>
                                        {{ trans('general.shipping') }}
                                        </span>
                                            </a>
                                        </div>
                                        @if($element->has_attributes && $element->product_attributes->pluck('size')->filter()->isNotEmpty())
                                            @include('frontend.wokiee.four.partials._page_show_sizes',['sizes' => $element->product_attributes->pluck('size')->unique()->filter(),'id' => $element->id])
                                            @include('frontend.wokiee.four.partials._page_show_colors',['colors' => $element->product_attributes->pluck('color')->unique()->filter(),'hidden' => true, 'id' => $element->id])
                                        @endif
                                    </div>
                                    @include('frontend.wokiee.four.partials._product_show_add_to_cart_btn')
                                @endif
                                {{--                            @auth--}}
                                {{--                                <div class="tt-wrapper">--}}
                                {{--                                    <ul class="tt-list-btn">--}}
                                {{--                                        <li>--}}
                                {{--                                            <a class="btn btn-link {{ $element->isFavorited ? 'active' : null }}" href="{{ route('frontend.favorite.product.add', $element->id) }}"><i--}}
                                {{--                                                        class="icon-n-072"></i>{{ trans('general.add_to_wish_list') }}</a>--}}
                                {{--                                        </li>--}}
                                {{--                                        --}}{{--<li><a class="btn-link" href="#"><i class="icon-n-08"></i>ADD TO COMPARE</a></li>--}}
                                {{--                                    </ul>--}}
                                {{--                                </div>--}}
                                {{--                            @endauth--}}

                                <div class="tt-wrapper">
                                    {{--                                @include('frontend.wokiee.four.partials._product_show_information_widget')--}}
                                    <div class="sharethis-inline-share-buttons"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
