@extends('frontend.wokiee.four.layouts.app')

@section('breadcrumbs')
    {{ Breadcrumbs::render('frontend.service.show', $element) }}
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
        <!-- mobile product slider  -->
    @include('frontend.wokiee.four.partials._service_show_gallery_mobile')
    <!-- /mobile product slider  -->
        <div class="container  container-fluid-mobile">
            <div class="row">
                <div class="col-6 hidden-xs">
                    @include('frontend.wokiee.four.partials._service_show_gallery')
                </div>
                <div class="col-6">
                    {{--Add To Cart--}}
                    @include('frontend.wokiee.four.partials._service_show_service_service_information')
                </div>
                <div class="col-12">
                    {{-- Tabs --}}
                    {{--                    @include('frontend.wokiee.four.partials._service_show_timings_and_additional_information')--}}
                    <div class="sharethis-inline-share-buttons"></div>
                </div>
            </div>
        </div>
    </div>
    {{--    @include('frontend.wokiee.four.partials._show_page_social_icons')--}}
    @include('frontend.wokiee.four.partials._show_page_related_items',['elements' => $relatedItems])
    @include('frontend.wokiee.four.partials._modal_page_show_video')
@endsection

@section('scripts')
    @parent
    @include('frontend.wokiee.four.partials._service_show_js')
    <script type="text/javascript"
            src="https://platform-api.sharethis.com/js/sharethis.js#property=5c6ed2597056550011c4ab2a&product=inline-share-buttons"></script>
@endsection
