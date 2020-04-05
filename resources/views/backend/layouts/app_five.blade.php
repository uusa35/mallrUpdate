<!DOCTYPE html>
<!--[if IE 8]>
<html lang="en" class="ie8 no-js"> <![endif]-->
<!--[if IE 9]>
<html lang="en" class="ie9 no-js"> <![endif]-->
<html lang="{{ app()->getLocale() }}" dir="{{ app()->isLocale('ar') ? 'rtl' : 'ltr' }}">

<head>
    <meta charset="utf-8"/>
    <title>{{ env('APP_NAME') }}</title>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta content="width=device-width, initial-scale=1" name="viewport"/>
    <meta content="" name="description"/>
    <meta content="" name="author"/>
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('app.name', 'Laravel') }}</title>
    @section('styles')
        @include('backend.partials.styles')
    @show
    <link rel="shortcut icon" href="{{ asset('images/logo.ico') }}"/>
    <link href="{{ asset('images/logo.png') }}" rel="shortcut icon" type="image/png">

</head>

<body class="page-header-fixed page-sidebar-closed-hide-logo">
<div class="wrapper">
    @include('backend.partials.nav_five')
    <div class="container-fluid">
        <div class="page-content">
        @include('backend.partials.sidebar')
        <div class="page-content-wrapper">
            <div class="page-content" style="min-height: 800px;">
                @include('backend.partials.notifications')
                @include('backend.partials._confirm_delete_modal')
                @include('backend.partials.breadcrumbs')
                @section('content')
                @show
            </div>
        </div>
        @include('backend.partials.footer')
    </div>
    @section('scripts')
        @include('backend.partials.scripts')
    @show
</div>¬
</body>

</html> 