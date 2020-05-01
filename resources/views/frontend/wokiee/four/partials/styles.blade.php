@include('frontend.wokiee.partials.styles')
@if(env('EVENTKM') && app()->isLocale('en'))
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
    </style>
@endif
@if(env('EVENTKM'))
    <style type="text/css">
        .alert-danger {
            color: #000000;
            background-color: #ffffff;
            border-color: #000000;
        }

        .alert-danger i {
            color: red !important;
        }

        .page-link, .page-item.disabled .page-link {
            border: none !important;
            background-color: transparent !important;
        }
    </style>
@endif
<style type="text/css">
    body, .tt-show, .page-link, .page-item.active, .page-link, .page-item.disabled {
        color: {{ $settings->main_theme_color ? $settings->main_theme_color : 'white' }};
        background-color: {{ $settings->main_theme_bg_color ? $settings->main_theme_bg_color : 'white' }};
    }

    p, .tt-collapse-content p, .tt-shopcart-table01 td, .tt-shopcart-table01 th {
        color: {{ $settings->main_theme_color ? $settings->main_theme_color : 'white' }}     !important;
    }

    header, .tt-color-scheme-01, .tt-footer-center, footer .tt-footer-custom:last-child
    .tt-color-scheme-02,
    .tt-badge-cart,
    .tt-search-type2-rtl, .tt-background, .dot,
    .headerunderline, .stuck.tt-stuck-nav {
        background-color: {{ $settings->header_theme_bg }}        !important;
    }

    footer .tt-color-scheme-02, footer, .tt-footer-center, .tt-footer-col, footer .tt-footer-custom:last-child {
        color: {{ $settings->footer_theme_color }}        !important;
        background-color: {{ $settings->footer_bg_theme_color }}        !important;
    }


    footer .tt-color-scheme-01 .tt-collapse-content a, footer .tt-color-scheme-01 {
        color: {{ $settings->footer_theme_color }}        !important;
    }

    .btn, .tt-btn-search-rtl, .tt-btn-search,
    .tt-menu-toggle.stylization-02,
    .tt-product:not(.tt-view) .tt-image-box,
    .btn-link, .btn-link:focus,
    .btn.btn-small:hover,
    .tt-back-to-top,
    .btn.btn-border,
    .tt-product:not(.tt-view) .tt-image-box .tt-btn-wishlist.active, .page-item.active .page-link,
    .tt-image-box .tt-btn-wishlist {
        color: {{ $settings->btn_text_theme_color }}        !important;
        background-color: {{ $settings->btn_bg_theme_color }}        !important;
        border-color: {{ $settings->btn_text_theme_color }}    !important;
    }

    .tt-shopcart-table-02 .tt-title a, .tt-product:not(.tt-view) .tt-description .tt-add-info li a,
    .tt-desctop-menu:not(.tt-hover-02) li.dropdown > a,
    .tt-desctop-menu:not(.tt-hover-02) li.dropdown.active > a,
    .tt-desctop-menu:not(.tt-hover-02), .tt-btn-quickview {
        color: {{ $settings->main_theme_color }}        !important;
    }

    .tt-mobile-header .tt-top-line {
        border-top: 1px solid {{ $settings->btn_bg_theme_color }}      !important;
    }

    li.dropdown.selected > a,
    .tt-menu-toggle.stylization-02,
    header .tt-dropdown-obj .tt-dropdown-toggle,
    header .tt-multi-obj ul li.active a [class^=icon-],
    .fa, .fa-fw,
    .datepicker-panel > ul > li,
    .tt-social-icon li a, .tt-social-icon li a:hover,
    .tt-desctop-menu:not(.tt-hover-02) li.dropdown > a, header .tt-dropdown-obj .tt-dropdown-toggle, .tt-dropdown-toggle {
        color: {{ $settings->menu_theme_color }}      !important;
    }

    .countdown-selection
    .theme-color,
    .tt-countdown, .tt-countdown_box,
    .tt-product-single-info > a,
    .tt-price, .old-price, p,
    .tt-login-form .tt-item .additional-links a,
    .money, .tt-description-wrapper, .tt-description-wrapper:hover, .tt-description,
    .tt-table-shop-01 tbody td a, .product-information-buttons a, .tt-services-block,
    header .tt-multi-obj ul li a:hover, header .tt-multi-obj ul li a:hover, .tt-btn-quickview:hover,
    .tt-product:not(.tt-view) .tt-image-box .tt-btn-quickview:hover,
    .tt-desctop-menu:not(.tt-hover-02) li.dropdown > a:hover, .tt-block-title .tt-description,
    .tt-promo-box.hover-type-2:hover, .tt-product:not(.tt-view):hover {

        color: {{ $settings->normal_text_theme_color }}        !important;
    }

    h1, h2, h3, .tt-dropdown-toggle, .countdown-selection .theme-color, .tt-countdown, .tt-countdown_box, .tt-product-single-info > a, .tt-price, .old-price,
    .form-check-label, .card-header, label, label:not(.error), .card-text,
    .tt-product:not(.tt-view) .tt-description .tt-title a,
    .money, .tt-collapse-content a, header .tt-multi-obj ul li.active a, .tt-table-shop-01 tbody td a, .product-information-buttons a, .tt-services-block .tt-col-icon {
        color: {{ $settings->header_one_theme_color }}  !important;
    }

    .tt-title, .tt-collapse-title, .tt-block-title {
        color: {{ $settings->header_one_theme_color }}        !important;
        border-color: {{ $settings->header_one_theme_color }}        !important;
    }

    @media (max-width: 1024px) {
        .tt-mobile-header {
            background-color: {{ $settings->header_theme_bg }}        !important;
            padding-bottom: 10px;
        }
    }

    .td-sm {
        width: 8% !important;
    }

    .tt-obj-search-type2 {
        width: 75%;
    }

    .select2-container--default .select2-selection--single {
        font-size: 17px;
        height: 38px;
        padding: 5px;
        max-width: 220px;
    }

    .select2-container--default .select2-results__group {
        background-color: #dbdbdb;
    }

    a .url-normal {
        text-decoration: none !important;
        color: {{ $settings->main_text_theme_color }}        !important;
        text-underline: none !important;
    }

    /*.tt-product:not(.tt-view) .tt-description {*/
    /*    background: transparent !important;*/
    /*}*/

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

    .tt-coming-soon {
        height: 100% !important;
    }

    .tt-col-icon, .tt-services-block .tt-col-icon {
        color: {{ $settings->icon_theme_color }}   !important;
    }
</style>
