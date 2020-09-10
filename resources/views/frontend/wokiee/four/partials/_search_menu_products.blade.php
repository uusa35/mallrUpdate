<div class="tt-col-obj tt-obj-search-type2">
    <div class="tt-search-type2">
        <!-- tt-search -->
        <form action="{{ route('frontend.product.search') }}" method="get" role="search">
{{--            <i class="icon-f-85"></i>--}}
            <input name="search" class="tt-search-input" type="search" placeholder="{{ trans('general.search') }}"
                   aria-label="{{ trans('general.search') }}" autocomplete="on">
            <button type="submit"
                    class="{{ app()->isLocale('ar') ? 'tt-btn-search-rtl' : 'tt-btn-search' }}">
                <i class="icon-search"></i>
                {{ trans('general.search') }}
            </button>
            <div class="search-results" style="display: none;"></div>
        </form>
        <!-- /tt-search -->
    </div>
</div>
