@section('title')
    <title>{{ $settings->company_ar .' '. $settings->company_en }}</title>
@show
<meta http-equiv="Content-type" charset="utf-8" content="text/html; charset=utf-8">
<!--[if IE]>
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<![endif]-->
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta name="{{ config('app.name') }}" content="E-commerce">
<meta name="theme-color" content="{{ $settings->main_theme_color }}">
<meta name="description"
      content="{{ trans('general.meta_description') . $settings->company_ar . $settings->company_en . trans('general.app_keywords')}}">
<meta name="keywords" content="{{ trans('general.app_keywords') }}"/>
<meta name="author" content="{{ trans('general.app_author') }}">
<meta name="country" content="{{ $settings->country }}">
<meta name="mobile" content="{{ $settings->mobile }}">
<meta name="phone" content="{{ $settings->phone }}">
<meta name="logo" content="{{ $settings->logoThumb }}">
<meta name="email" content="{{ $settings->email }}">
<meta name="address" content="{{ $settings->address }}">
<meta name="name" content="{{ $settings->company }}">
<meta name="lang" content="{{ app()->getLocale() }}">
<meta itemProp="name" content="{{ $settings->company }}"/>
<meta itemProp="description" content="{{ trans('general.meta_description') }}"/>
<meta itemProp="image" content="{{ $settings->logoThumb }}"/>
<link rel="shortcut icon" href="{{ asset('images/logo.ico') }}"/>
<link rel="apple-touch-icon-precomposed" sizes="144x144" href="{{ $settings->logoThumb }}">
<link href="{{ $settings->logoThumb }}" rel="shortcut icon" type="image/jpg">
@if(env('SCRAP'))
    <meta name="google-site-verification" content="SR81NY4elhoRSNXOc1cHIIpu80aTPeiDiipsk4CMvRo"/>
@elseif(env('EVENTKM'))
    <meta name="google-site-verification" content="zf7iPSnuJgFO519GO36uRJRgzZGHJCN0oAOjwm3fORk"/>
@elseif(env('ABATI'))
    <meta name="google-site-verification" content="fy3pTvV0z024nR79nukGxw-tnOmJ2F5BnMeayo-g4-c"/>
@elseif(env('MALLR'))
    <meta name="google-site-verification" content="jr-GtLYg64G51nUppCuaH_p0C4NkAcofU5bPIkI9jG0"/>
@endif
<script src="https://cdn.onesignal.com/sdks/OneSignalSDK.js" async=""></script>
<script>
    var OneSignal = window.OneSignal || [];
    OneSignal.push(function() {
        OneSignal.init({
            appId: `{!! env('ONE_SIGNAL_APP_ID') !!}`,
        });
    });
</script>
