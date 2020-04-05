<!doctype html>
{{--<html lang="{{ app()->getLocale() }}" class="tt-boxed">--}}
<html lang="{{ app()->getLocale() }}">
<head>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    @section('head')
        @include('frontend.wokiee.four.partials.head')
    @show
    @section('styles')
        @include('frontend.wokiee.four.partials.styles')
    @show
</head>

<body>
@if(!app()->isLocal())
    @include('frontend.wokiee.four.partials.loader')
@endif

@section('content')
@section('breadcrumbs')
@show
<div id="tt-pageContent">
    @include('frontend.wokiee.four.partials.notifications')
    @yield('body')
</div>
@show

@section('scripts')
    @include('frontend.wokiee.four.partials.scripts')
@show
</body>
</html>
