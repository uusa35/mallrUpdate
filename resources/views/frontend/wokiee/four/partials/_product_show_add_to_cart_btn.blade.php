<div class="tt-wrapper">
    <div class="tt-row-custom-01">
        <div class="col-item">
            <div class="tt-input-counter style-01" data-tooltip="{{ trans('general.choose_color_first') }}"
                 data-tposition="bottom">
                <span class="minus-btn" id="minus-btn-{{ $element->id }}" data-product-id="{{ $element->id }}"></span>
                @if($element->has_attributes)
                    <input id="max-qty-{{ $element->id }}" type="number" value="1" size="1"/>
                @else
                    <input id="max-qty-{{ $element->id }}" type="number" value="1" size="{{ $element->qty }}"/>
                @endif
                <span class="plus-btn" id="plus-btn-{{ $element->id }}" data-product-id="{{ $element->id }}"></span>
            </div>
        </div>
        <div class="col-item">
            <form method="post" action="{{ route('frontend.cart.add.product') }}" id="product-{{ $element->id }}">
                @csrf
                @if(request()->has('collection_id') || isset($collection_id))
                    <input type="hidden" id="collection_id" name="collection_id"
                           value="{{ request()->has('collection_id') ? request()->collection_id : $collection_id }}">
                @endif
                <input type="hidden" id="product_id_{{ $element->id }}" name="product_id" value="{{ $element->id }}">
                <input type="hidden" id="size_id_{{ $element->id }}" name="size_id" value="">
                <input type="hidden" id="color_id_{{ $element->id }}" name="color_id" value="">
                <input type="hidden" id="qty_{{ $element->id }}" name="qty" value="1"
                       data-element-id="{{ $element->id }}">
                <input type="hidden" id="product_attribute_id_{{ $element->id }}" name="product_attribute_id" value="">
                <input type="hidden" name="type" value="product">
                <button type="submit" id="add_to_cart_{{ $element->id }}"
                        data-tooltip="{{ trans('general.choose_color_then_size') }}"
                        data-tposition="top"
                        role="tooltip"
                        disabled="{{ $element->has_attributes }}"
                        class="btn btn-lg  tooltip"
                        id="add_to_cart"><i class="icon-f-39"></i>{{ trans('general.add_to_cart') }}</button>
                @if($element->has_attributes)
                    <p class="text-center">
                        {{ trans('general.choose_color_then_size') }}
                    </p>
                @endif
            </form>
        </div>
    </div>
</div>
