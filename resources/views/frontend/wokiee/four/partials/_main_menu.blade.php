<div class="tt-desktop-header headerunderline">
    <div class="container">
        <div class="tt-header-holder text-center">
            {{--            <div class="tt-col-obj tt-obj-logo">--}}
            <div class="tt-obj-logo obj-aligment-center">
                <!-- logo -->
                <a class="tt-logo tt-logo-alignment" href="{{ route('frontend.home') }}">
                    <img class="text-center" src="{{ $settings->logoThumb }}"
                         alt="{{ $settings->company }}"></a>
                <!-- /logo -->
            </div>
            <div class="col-12 text-left">
                <div class="tt-col-obj tt-obj-search-type2">
                    <div class="tt-search-type2" style="margin-top: 12px;">
                        @include('frontend.wokiee.four.partials._search_form')
                    </div>
                </div>
            </div>
        </div>

    </div>


    <div class="container small-header">
        <div class="tt-header-holder">
            {{--            @include('frontend.wokiee.four.partials._main_menu_categories')--}}
            <div class="tt-col-obj tt-obj-menu">
                <!-- tt-menu -->
                <div class="tt-desctop-parent-menu tt-parent-box">
                    <div class="tt-desctop-menu">
                        <nav>
                            <ul>
                                <li class="dropdown tt-megamenu-col-02 selected">
                                    <a href="{{ route('frontend.home') }}">{{ trans('general.home_page') }}</a>
                                </li>
                                @include('frontend.wokiee.four.partials._categories_main_menu_element_with_images')
                                @include('frontend.wokiee.four.partials._pages_main_menu')
                                @if($categories->where('is_parent', true)->where('on_home', true)->count() <= 5)
                                    <li class="dropdown">
                                        <a href="{{ route('frontend.language.change',['locale' => 'ar']) }}">{{ trans('general.arabic') }}</a>
                                        <a href="{{ route('frontend.language.change',['locale' => 'en']) }}">{{ trans('general.english') }}</a>
                                    </li>
                                @endif
                            </ul>
                        </nav>
                    </div>
                </div>
                <!-- /tt-menu -->
            </div>
            <div class="tt-col-obj tt-obj-options obj-move-right">
                <!-- tt-search -->
                <div class="tt-desctop-parent-search tt-parent-box tt-obj-desktop-hidden">
                    <div class="tt-search tt-dropdown-obj">
                        <button class="tt-dropdown-toggle" data-tooltip="Search" data-tposition="bottom">
                            <i class="icon-f-85"></i>
                        </button>
                        <div class="tt-dropdown-menu">
                            <div class="container">
                                <form>
                                    <div class="tt-col">
                                        <input type="text" class="tt-search-input"
                                               placeholder="{{ trans('general.search') }}">
                                        <button class="tt-btn-search" type="submit"></button>
                                    </div>
                                    <div class="tt-col">
                                        <button class="tt-btn-close icon-g-80"></button>
                                    </div>
                                    <div class="tt-info-text">
                                        {{ trans('message.what_are_you_looking_for') }}
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- /tt-search -->
                <!-- tt-cart -->
                <div class="tt-desctop-parent-cart tt-parent-box">
                    <div class="tt-cart tt-dropdown-obj" data-tooltip="Cart" data-tposition="bottom">
                        <button class="tt-dropdown-toggle">
                            <i class="icon-f-39"></i>
                            <span class="tt-badge-cart">
                                @if(Cart::content()->where('options.type', 'country')->first())
                                    {{ Cart::count() - 1 }}
                                @else
                                    {{ Cart::count() }}
                                @endif
                            </span>
                        </button>
                        <div class="tt-dropdown-menu">
                            <div class="tt-mobile-add">
                                <h6 class="tt-title">{{ trans('general.shopping_cart') }}</h6>
                                <button class="tt-close">{{ trans('general.close') }}</button>
                            </div>
                            <div class="tt-dropdown-inner">
                                <div class="tt-cart-layout">
                                @if(Cart::count() > 0)
                                    @include('frontend.wokiee.four.partials._main_menu_cart_items')
                                @else
                                    <!-- layout emty cart -->
                                        <a href="empty-cart.html" class="tt-cart-empty">
                                            <i class="icon-f-39"></i>
                                            <p>{{ trans('general.no_items_in_cart') }}</p>
                                        </a>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- /tt-cart -->
                <!-- tt-account -->
            @include('frontend.wokiee.four.partials._menu_user_account')
            <!-- /tt-account -->
                <!-- tt-langue and tt-currency -->
            @include('frontend.wokiee.four.partials._menu_currency_lang')
            <!-- /tt-langue and tt-currency -->
            </div>
        </div>
    </div>
</div>
