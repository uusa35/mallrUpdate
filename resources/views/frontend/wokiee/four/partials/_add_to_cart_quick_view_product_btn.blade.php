{{--<a href="#" class="tt-btn-quickview" data-toggle="modal"--}}
{{--   data-target="#addToCart-{{ $element->id }}"--}}
{{--   data-tooltip="{{ trans('general.quick_view') }}"--}}
{{--   data-tposition="{{ app()->isLocale('ar') ? 'right' : 'left' }}"--}}
{{--   data-name="{{ $element->name }}"--}}
{{--   data-id="{{ $element->id }}"--}}
{{--   data-image="{{ $element->imageLargeLink }}"--}}
{{--   data-notes="{{ $element->notes }}"--}}
{{--   data-description="{{ $element->description }}"--}}
{{--   data-sku="{{ $element->sku }}"--}}
{{--   data-qty="{{ $element->availableQty }}"--}}
{{--   data-price="{{ $element->convertedFinalPrice }}"--}}
{{--   data-currency-name="{{ $currency->symbol }}"--}}
{{--   @if($element->has_attributes && $element->product_attributes->filter()->isNotEmpty())--}}
{{--   data-colors="@foreach($element->product_attributes->pluck('colors')->unique()->filter() as $col) {!! $col->name !!}, @endforeach"--}}
{{--   data-sizes="@foreach($element->product_attributes->pluck('size')->unique()->filter() as $size) {!! $size->name !!}, @endforeach"--}}
{{--   @else--}}
{{--   @if($element->color)--}}
{{--   data-colors="{!! $element->color->name !!}"--}}
{{--   data-sizes="{!! $element->size->name !!}"--}}
{{--   @endif--}}
{{--   @endif--}}
{{--   data-url="{{ route('frontend.product.show.name', ['id' => $element->id, 'name' => $element->name]) }}"--}}
{{--></a>--}}
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
                                    <div class="tt-wrapper">
                                        <div class="tt-title-options">{{ trans('general.colors') }}:</div>
                                        <ul class="tt-options-swatch options-large">
                                            @foreach($element->product_attributes->pluck('color')->unique('id') as $col)
                                                <li><a class="options-color" style="background-color: {{ $col->code }}"
                                                       href="#"></a></li>
                                            @endforeach
                                        </ul>
                                    </div>
                                    <div class="tt-product-inside-hover text-center mt-4">
                                        <div class="tt-row-btn">
                                            {{--            @if(isset($view) && $view)--}}
                                            <a href="{{ route('frontend.product.show.name',['id' => $element->id , 'name' => $element->name]) }}"
                                               class="btn btn-large col-lg-12 mb-2">
                                                <i class="fa fa-fw fa-lg fa-shopping-cart"></i>
                                                {{ trans('general.order_now') }}
                                            </a>
                                        </div>
                                    </div>
                                @endif

                                <div class="tt-wrapper">
                                    @include('frontend.wokiee.four.partials._product_show_information_widget')
                                    @desktop
                                    <div class="sharethis-inline-share-buttons"></div>
                                    @enddesktop
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
