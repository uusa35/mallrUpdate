@extends('frontend.wokiee.four.layouts.app')

@section('breadcrumbs')
    {{ Breadcrumbs::render('frontend.classified.show',$element) }}
@endsection

@section('title')
    <title>{{ $element->name }}</title>
    <meta name="title" content="{{ $element->name .' '. $element->description }}">
    @if(\Str::contains(Route::getCurrentRoute()->getName(), ['product','service']))
        @if($settings->facebook)
            <meta itemProp="facebook" content="{{ $settings->facebook }}"/>
            <meta property="facebook:card" content="{{ $element->imageThumbLink }}">
            <meta property="facebook:url" content="{{ url()->current() }}">
            <meta property="facebook:title" content="{{ $element->company }}">
            <meta property="facebook:description" content="{{ $element->description }}">
            <meta property="facebook:image" content="{{ $element->imageThumbLink }}">
        @endif
        @if($settings->twitter)
            <meta itemProp="twitter" content="{{ $settings->twitter }}"/>
            <meta property="twitter:card" content="{{ $element->imageThumbLink }}">
            <meta property="twitter:url" content="{{ url()->current() }}">
            <meta property="twitter:title" content="{{ $element->name }}">
            <meta property="twitter:description" content="{{ $element->description }}">
            <meta property="twitter:image" content="{{ $element->imageThumbLink }}">
        @endif
        @if($settings->instagram)
            <meta itemProp="instagram" content="{{ $settings->instagram }}"/>
            <meta property="instagram:card" content="{{ $element->imageThumbLink }}">
            <meta property="instagram:url" content="{{ url()->current() }}">
            <meta property="instagram:title" content="{{ $element->name }}">
            <meta property="instagram:description" content="{{ $element->description }}">
            <meta property="instagram:image" content="{{ $element->imageThumbLink }}">
        @endif
    @endif
@show

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
                        @include('frontend.wokiee.four.partials._show_page_item_title_description_and_prices')
                        @include('frontend.wokiee.four.partials._service_show_is_really_hot_element')
                        @auth
                            <div class="tt-wrapper mb-5">
                                <div class="tt-row-btn">
                                    <a class="btn btn-small col-lg-12 {{ $element->isFavorited ? 'active' : null }}"
                                       href="{{ route('frontend.favorite.classified.add', $element->id) }}"><i
                                                class="icon-n-072"></i>{{ trans('general.add_to_wish_list') }}</a>
                                    {{--<li><a class="btn-link" href="#"><i class="icon-n-08"></i>ADD TO COMPARE</a></li>--}}
                                </div>
                            </div>
                        @endauth
                        @include('frontend.wokiee.four.partials.classified._category_group_widget')
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

