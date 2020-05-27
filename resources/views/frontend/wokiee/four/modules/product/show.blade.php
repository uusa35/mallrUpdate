@extends('frontend.wokiee.four.layouts.app')

@section('breadcrumbs')
    {{ Breadcrumbs::render('frontend.product.show',$element) }}
@endsection

@section('body')
    <div class="container-indent">
        @include('frontend.wokiee.four.partials._service_show_gallery_mobile')
        <div class="container  container-fluid-mobile">
            <div class="row">
                <div class="col-6 hidden-xs">
                    @include('frontend.wokiee.four.partials._service_show_gallery')
                </div>
                <div class="col-6">
                    <div class="tt-product-single-info">
                        @if(!env('EVENTKM'))
                            @include('frontend.wokiee.four.partials._show_tags')
                        @endif
                        @include('frontend.wokiee.four.partials._show_page_item_title_description_and_prices')
                        @include('frontend.wokiee.four.partials._service_show_is_really_hot_element')
                        @include('frontend.wokiee.four.partials._shipment_and_size_chart_btns')
                        @if($element->canOrder)
                            <div class="tt-swatches-container">
                                @if($element->has_attributes)
                                    <div id="productAttributeApp"></div>
                                @endif
                                {{--                                @if($element->has_attributes && $element->product_attributes->isNotEmpty())--}}
                                {{--                                    @include('frontend.wokiee.four.partials._page_show_sizes',['sizes' => $element->product_attributes->pluck('size')->unique(),'id' => $element->id])--}}
                                {{--                                    @include('frontend.wokiee.four.partials._page_show_colors',['colors' => $element->product_attributes->pluck('color')->unique(),'hidden' => true,'id' => $element->id])--}}
                                {{--                                @endif--}}
                            </div>
                            @include('frontend.wokiee.four.partials._product_show_add_to_cart_btn')
                        @endif
                        @auth
                            <div class="tt-wrapper mb-5">
                                <div class="tt-row-btn">
                                        <a class="btn btn-small col-lg-12 {{ $element->isFavorited ? 'active' : null }}"
                                           href="{{ route('frontend.favorite.product.add', $element->id) }}"><i
                                                    class="icon-n-072"></i>{{ trans('general.add_to_wish_list') }}</a>
                                    {{--<li><a class="btn-link" href="#"><i class="icon-n-08"></i>ADD TO COMPARE</a></li>--}}
                                </div>
                            </div>
                        @endauth

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
    @include('frontend.wokiee.four.partials._show_page_social_icons')
    @desktop
    @include('frontend.wokiee.four.partials._show_page_related_items',['elements' => $relatedItems])
    @enddesktop
    @include('frontend.wokiee.four.partials._modal_page_show_video')
    @include('frontend.wokiee.four.partials._modal_size_chart')
    @include('frontend.wokiee.four.partials._modal_page_show_shipment')
@endsection

@section('scripts')
    @parent
    @desktop
    <script type="text/javascript"
            src="https://platform-api.sharethis.com/js/sharethis.js#property=5c6ed2597056550011c4ab2a&product=inline-share-buttons"></script>
    @enddesktop
@endsection

