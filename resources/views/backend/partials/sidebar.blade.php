<div class="page-sidebar-wrapper">
    <div class="page-sidebar navbar-collapse collapse">
        <ul class="page-sidebar-menu  page-header-fixed page-sidebar-menu-hover-submenu page-sidebar-menu-closed"
            data-keep-expanded="false" data-auto-scroll="true" data-slide-speed="200">
            @can('isSuper')
                @include('backend.partials._sidebar_super')
            @elsecan('isAdmin')
                @include('backend.partials._sidebar_admin')
            @elsecan('isCompany')
                @include('backend.partials._sidebar_company')
            @elseCan('isDesigner')
                @include('backend.partials._sidebar_designer')
            @endcan
        </ul>
    </div>
</div>
