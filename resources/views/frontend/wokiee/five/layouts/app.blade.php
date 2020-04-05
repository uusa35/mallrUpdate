<!doctype html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    @section('head')
        @include('frontend.wokiee.five.partials.head')
    @show
    @section('styles')
        @include('frontend.wokiee.five.partials.styles')
    @show
</head>

<body>
@include('frontend.wokiee.five.partials.loader')
<div class="page-wrapper">
    @section('header')
        @include('frontend.wokiee.five.partials.header')
    @show
    @section('content')
        <div id="tt-pageContent">
            <div class="tt-offset-20 container-indent">
                <div class="container">
            @yield('body')
                </div>
            </div>
        </div>
    @show

<!--footer start-->
    @section('footer')
        @include('frontend.wokiee.five.partials.footer')
    @show
<!--footer end-->
    @section('models')
        @include('frontend.wokiee.five.partials.models')
    @show

    @section('scripts')
        @include('frontend.wokiee.five.partials.scripts')
    @show
</div>
</body>
</html>
