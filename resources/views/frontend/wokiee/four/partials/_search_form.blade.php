@if(env('MALLR') || env('DAILY') || env('HTB') || env('NASH'))
    @include('frontend.wokiee.four.partials._search_menu_products')
@elseif(env('EVENTKM'))
    @include('frontend.wokiee.four.partials._search_menu_services')
@endif
