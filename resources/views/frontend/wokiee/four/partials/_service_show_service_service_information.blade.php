<div class="tt-product-single-info">
    {{--    @include('frontend.wokiee.four.partials._show_tags')--}}
    @include('frontend.wokiee.four.partials._show_page_item_title_description_and_prices')
    @include('frontend.wokiee.four.partials._service_show_is_really_hot_element')

    @if($element->is_available)
        {{-- i want to show the service only --}}
        {{-- Choose Date & Time --}}
        @include('frontend.wokiee.four.partials._service_show_service_choose_date')
        {{-- Add To Cart FORM Btn + Form --}}
        <div class="tt-wrapper service_alert d-none" id="service_form">
            <div class="tt-row-custom-01">
                <div class="col-12">
                    <div class="card text-center">
                        <div class="card-header">
                            {{ trans('general.choosen_service') }}
                        </div>
                        <div class="card-body">
                            <h5 id="service-chosen-title"></h5>
                            <div class="col-12">
                                <form action="{{ route('frontend.cart.add.service') }}" method="post" class="col-12">
                                    @csrf
                                    <div class="form-group">
                                    <textarea name="notes" class="form-control" rows="3"
                                              placeholder="{{ trans('message.service_cart_add_item_notes') }}"
                                              data-tooltip="{{ trans('message.cart_notes') }}"
                                              id="textareaMessage"></textarea>
                                    </div>
                                    @include('frontend.wokiee.four.partials._select_element_timing_id')
                                    <input type="hidden" name="service_id" id="service_id"
                                           value="{{ $element->id }}">
                                    <input type="hidden" name="user_id" value="{{ $element->user_id }}">
                                    <input type="hidden" name="day_selected" id="day_selected" value="">
                                    <input type="hidden" name="day_selected_format" id="day_selected_format"
                                           value="{{ session()->has('day_selected_format') ? session()->get('day_selected_format') : null }}">
                                    <input type="hidden" name="type" value="service">
                                    <button type="submit"
                                            class="btn btn-lg cart-btn disabled"
                                            data-tooltip="{{ trans('message.cart_btn') }}"
                                    ><i class="icon-f-39"></i>{{ trans('general.add_to_cart') }}
                                    </button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endif
    {{-- After Add To Cart Button--}}
    @include('frontend.wokiee.four.partials._service_show_information_widget')
</div>