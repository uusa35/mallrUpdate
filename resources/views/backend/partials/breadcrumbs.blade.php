<div class="page-bar">
    <ul class="page-breadcrumb">
        @section('breadcrumbs')
            @if(isset($breadcrumbs) && $breadcrumbs->isNotEmpty())
                <ol class="breadcrumb">
                    @foreach ($breadcrumbs as $breadcrumb)
                        @if ($breadcrumb->url && !$loop->last)
                            <li class="breadcrumb-item">
                                <a href="{{ $breadcrumb->url }}">{{ $breadcrumb->title }}</a>
                            </li>
                        @else
                            <li class="breadcrumb-item active">
                                {{ $breadcrumb->title }}</li>
                        @endif
                    @endforeach
                </ol>
            @endif
        @show
    </ul>
    <div class="page-toolbar">
        <div class="btn-group pull-right">
            <button type="button" class="btn btn-fit-height grey-salt dropdown-toggle" data-toggle="dropdown"
                    data-hover="dropdown" data-delay="1000" data-close-others="true"> {{ trans('general.actions') }}
                <i class="fa fa-angle-down"></i>
            </button>
            <ul class="dropdown-menu pull-right" role="menu">
                <li>
                    <a href="{{ route('backend.home') }}">
                        <i class="icon-user-following"></i> {{ trans('general.dashboard') }}</a>
                </li>
                <li>
                    <a href="{{ route('frontend.home') }}">
                        <i class="icon-home"></i> {{ trans('general.home') }}</a>
                </li>
                <li class="divider"></li>
                @can('isSuper')
                    <li>
                        <a href="{{ route('backend.admin.setting.edit',1) }}">
                            <i class="icon-settings"></i>{{ trans('general.edit_settings') }}</a>
                    </li>
                    <li>
                        <a href="{{ route('backend.admin.setting.index') }}">
                            <i class="icon-settings"></i> {{ trans('general.settings') }}</a>
                    </li>
                @endcan
            </ul>
        </div>
    </div>
</div>
<!-- END PAGE HEADER-->