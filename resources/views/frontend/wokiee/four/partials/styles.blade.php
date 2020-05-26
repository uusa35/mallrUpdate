@include('frontend.wokiee.partials.styles')
@if(env('EVENTKM'))
    <style type="text/css">
        @font-face {
            font-family: 'School';
            src: url('fonts/School_Times.ttf') format('truetype');
            font-weight: normal;
            font-style: normal;
        }

        body, html, div, a, p, h1, h2, h3, h4, h5, h6, table, row, td, th, tr, thead, tfoot, button, span, .btn, .btn-del, ul, li, .page-content, .portlet, .light, .profile-sidebar-portlet {
            font-family: 'School', 'sans-serif' !important;
            text-transform: uppercase !important;
        }

        .alert-danger i {
            color: red !important;
        }

        .alert-danger {
            color: #000000;
            background-color: #ffffff;
            border-color: #000000;
        }

        .page-link, .page-item.disabled .page-link {
            border: none !important;
            background-color: transparent !important;
        }

        .tt-product:not(.tt-view) .tt-description {
            background-color: black !important;
        }
    </style>
@endif

<style type="text/css">
    @if(env('MALLR') || env('ABATI'))

    body, html, a, p, h1, h2, h3, h4, h5, h6, table, row, td, th, tr, td, thead, tfoot, span, .btn, ul, li,
    .container, .tt-title-small, .tt-description, header, footer
    .tt-collapse-title, .tt-collapse-content, .tt-collapse-block .tt-item .tt-collapse-title,
    .tt-label, .tt-label-sale, tt-label-new, tt-label tt-label-our-fatured,
    .tt-product-single-info .tt-label [class^=tt-label], .tt-collapse-title,
    .tt-desctop-menu nav > ul > li.dropdown > a,
    .tt-collapse-content, .tt-title-options, .form-group, .form, .tt-table-03, select, option, .form-default select.form-control:not([size]):not([multiple])
    .form-default .form-group, label, label:not(.error), .tt-cart-total-title, .tt-cart-total-price, .tt-title-large, .tt-title {
        /*font-family: 'fb', 'sans-serif' !important;*/
        @if(app()->isLocale('ar'))
 font-family: 'skynews', 'sans-serif' !important;
        @else
 font-family: 'Tajawal-Medium', 'sans-serif' !important;
    @endif

    }

    @elseif(env('DAILY'))
    body, html, a, p, h1, h2, h3, h4, h5, h6, table, row, td, th, tr, td, thead, tfoot, span, .btn, ul, li,
    .container, .tt-title-small, .tt-description, header, footer
    .tt-collapse-title, .tt-collapse-content, .tt-collapse-block .tt-item .tt-collapse-title,
    .tt-label, .tt-label-sale, tt-label-new, tt-label tt-label-our-fatured,
    .tt-product-single-info .tt-label [class^=tt-label], .tt-collapse-title,
    .tt-collapse-content, .tt-title-options, .form-group, .form, .tt-table-03, select, option, .form-default select.form-control:not([size]):not([multiple])
    .form-default .form-group, label, label:not(.error), .tt-cart-total-title, .tt-cart-total-price, .tt-title-large, .tt-title {
        @if(app()->isLocale('ar'))
 font-family: 'GE SS Unique', 'sans-serif' !important;
        @else
 font-family: 'Tajawal-Medium', 'sans-serif' !important;
    @endif

    }

    @elseif(env('SCRAP') || env('HOMEKEY') || env('EXPO'))
    body, html, a, p, h1, h2, h3, h4, h5, h6, table, row, td, th, tr, td, thead, tfoot, span, .btn, ul, li,
    .container, .tt-title-small, .tt-description, header, footer
    .tt-collapse-title, .tt-collapse-content, .tt-collapse-block .tt-item .tt-collapse-title,
    .tt-label, .tt-label-sale, tt-label-new, tt-label tt-label-our-fatured,
    .tt-product-single-info .tt-label [class^=tt-label], .tt-collapse-title,
    .tt-collapse-content, .tt-title-options, .form-group, .form, .tt-table-03, select, option, .form-default select.form-control:not([size]):not([multiple])
    .form-default .form-group, label, label:not(.error), .tt-cart-total-title, .tt-cart-total-price, .tt-title-large, .tt-title {
        @if(app()->isLocale('ar'))
 font-family: 'Tajawal-Medium', 'sans-serif' !important;
        @else
 font-family: 'Tajawal-Medium', 'sans-serif' !important;
    @endif
    }

    @endif
    body, .tt-show, .page-link, .page-item.active, .page-link, .page-item.disabled {
        color: {{ $settings->main_theme_color ? $settings->main_theme_color : 'white' }};
        background-color: {{ $settings->main_theme_bg_color ? $settings->main_theme_bg_color : 'white' }};
    }

    p, .tt-collapse-content p, .tt-shopcart-table01 td, .tt-shopcart-table01 th {
        color: {{ $settings->main_theme_color ? $settings->main_theme_color : 'white' }}           !important;
    }

    header, .tt-color-scheme-01, .tt-footer-center, footer .tt-footer-custom:last-child
    .tt-color-scheme-02,
    .tt-badge-cart,
    .tt-search-type2-rtl, .tt-background, .dot,
    .headerunderline, .stuck.tt-stuck-nav {
        background-color: {{ $settings->header_theme_bg }}              !important;
    }

    footer .tt-color-scheme-02, footer, .tt-footer-center, .tt-footer-col, footer .tt-footer-custom:last-child {
        color: {{ $settings->footer_theme_color }}              !important;
        background-color: {{ $settings->footer_bg_theme_color }}              !important;
    }


    footer .tt-color-scheme-01 .tt-collapse-content a, footer .tt-color-scheme-01 {
        color: {{ $settings->footer_theme_color }}              !important;
    }

    .btn, .tt-btn-search-rtl, .tt-btn-search,
    .tt-menu-toggle.stylization-02,
    .tt-product:not(.tt-view) .tt-image-box,
    .btn-link, .btn-link:focus,
    .btn.btn-small:hover,
    .tt-back-to-top,
    .btn.btn-border,
    .tt-product:not(.tt-view) .tt-image-box .tt-btn-wishlist.active, .page-item.active .page-link,
    .tt-image-box .tt-btn-wishlist,
    ul.tt-options-swatch li.active a:not(.options-color):not(.options-color-img), ul.tt-options-swatch li:hover a:not(.options-color):not(.options-color-img),
    .btn > .fa .fa-fw,
    .tt-product:not(.tt-view):hover .tt-image-box .tt-btn-quickview, .tt-product:not(.tt-view):hover .tt-image-box .tt-btn-quickview:hover {
        color: {{ $settings->btn_text_theme_color }}              !important;
        background-color: {{ $settings->btn_bg_theme_color }}              !important;
    }

    .tt-product:not(.tt-view) .tt-add-info li a,
    .tt-desctop-menu:not(.tt-hover-02) li.dropdown > a,
    .tt-desctop-menu:not(.tt-hover-02) li.dropdown.active > a,
    .tt-desctop-menu:not(.tt-hover-02), .tt-btn-quickview {
        color: {{ $settings->main_theme_color }}      !important;
    }

    .tt-mobile-header .tt-top-line {
        border-top: 1px solid {{ $settings->btn_bg_theme_color }}            !important;
    }

    li.dropdown.selected > a,
    .tt-menu-toggle.stylization-02,
    header .tt-dropdown-obj .tt-dropdown-toggle,
    header .tt-multi-obj ul li.active a [class^=icon-],
    .datepicker-panel > ul > li,
    .tt-social-icon li a, .tt-social-icon li a:hover,
    .tt-desctop-menu:not(.tt-hover-02) li.dropdown > a, header .tt-dropdown-obj .tt-dropdown-toggle, .tt-dropdown-toggle {
        color: {{ $settings->menu_theme_color }}            !important;
    }

    .countdown-selection
    .theme-color,
    .tt-countdown, .tt-countdown_box,
    .tt-product-single-info > a,
    .tt-price, .old-price, p,
    .tt-login-form .tt-item .additional-links a,
    .tt-description,
    .money, .tt-description-wrapper, .tt-description-wrapper:hover,
    .product-information-buttons a, .tt-services-block,
    header .tt-multi-obj ul li a:hover, header .tt-multi-obj ul li a:hover, .tt-btn-quickview:hover,
    .tt-product:not(.tt-view) .tt-image-box .tt-btn-quickview:hover,
    .tt-desctop-menu:not(.tt-hover-02) li.dropdown > a:hover, .tt-block-title,
    .tt-promo-box.hover-type-2:hover, .tt-product:not(.tt-view):hover, .tt-collapse-content a {

        color: {{ $settings->normal_text_theme_color }}              !important;
    }

    h1, h2, h3, .tt-dropdown-toggle, .countdown-selection .theme-color, .tt-countdown, .tt-countdown_box, .tt-product-single-info > a, .tt-price, .old-price,
    .form-check-label, .card-header, label, label:not(.error), .card-text,
    .money, header .tt-multi-obj ul li.active a, .product-information-buttons a, .tt-services-block .tt-col-icon,
    .tt-title, .tt-collapse-title, .tt-block-title, .tt-block-title .tt-title a {
        color: {{ $settings->header_one_theme_color }}        !important;
    }

    .tt-product:not(.tt-view) .tt-description .tt-title a, .tt-shopcart-table-02 .tt-title a,
    .tt-table-shop-01 tbody td a {
        color: {{ $settings->header_tow_theme_color }}        !important;
    }

    @media (max-width: 1024px) {
        .tt-mobile-header {
            background-color: {{ $settings->header_theme_bg }}              !important;
            padding-bottom: 10px;
        }
    }

    a .url-normal {
        text-decoration: none !important;
        color: {{ $settings->main_text_theme_color }}              !important;
        text-underline: none !important;
    }

    /*     mobile menu */
    .panel-menu {
        color: {{ $settings->main_theme_color ? $settings->main_theme_color : 'white' }};
        background-color: {{ $settings->main_theme_bg_color ? $settings->main_theme_bg_color : 'white' }};
    }

    .panel-menu li.mm-close-parent .mm-close,
    .panel-menu #mm0.mmpanel a:not(.mm-close), .panel-menu #mm0.mmpanel a:not(.mm-close):after, .panel-menu .mm-original-link,
    .panel-menu ul li a,
    .panel-menu .mm-prev-level {
        color: {{ $settings->main_theme_color ? $settings->main_theme_color : 'white' }};
    }

    .tt-col-icon, .tt-services-block .tt-col-icon {
        color: {{ $settings->icon_theme_color }}         !important;
    }
</style>
