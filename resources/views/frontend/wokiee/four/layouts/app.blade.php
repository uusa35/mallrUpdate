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

@if(env('MALLR') || env('BITS') || ENV('EVENTKM') || env('DAILY') || env('HTB'))
@section('header')
    @include('frontend.wokiee.four.partials.header')
@show
@endif
@section('content')
@section('breadcrumbs')
@show
<div id="tt-pageContent">
    @include('frontend.wokiee.four.partials.notifications')
    @yield('body')
</div>
@show
@if(env('MALLR') || env('BITS') || ENV('EVENTKM') || env('DAILY') || env('HTB'))
@section('footer')
    @include('frontend.wokiee.four.partials.footer')
@show
@section('models')
    @include('frontend.wokiee.four.partials.modals')
@show
@endif

@section('scripts')
    @include('frontend.wokiee.four.partials.scripts')
@show
</body>
</html>
