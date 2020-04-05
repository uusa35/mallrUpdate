<div class="portlet-title">
    <div class="caption font-light">
        <i class="icon-settings font-dark"></i>
        <span class="caption-subject bold uppercase">
                {{ isset($title) ? $title : trans('general.'.strtolower((string) Route::currentRouteName())) }}
        </span>
    </div>
</div>
