@can('index','product')
    <li class="nav-item {{ activeItem('product') }}">
        <a href="{{ route('backend.product.index')}}" class="nav-link nav-toggle">
            <i class="fa fa-fw fa-product-hunt"></i>
            <span class="title">Products</span>
            <span class="selected"></span>
            <span class="arrow open"></span>
        </a>
        <ul class="sub-menu">
            <li class="nav-item ">
                <a href="{{ route('backend.product.index') }}" class="nav-link ">
                    <i class="fa fa-fw fa-product-hunt"></i>
                    <span class="title">All Products</span>
                    <span class="arrow"></span>
                </a>
            </li>
            <li class="nav-item ">
                <a href="{{ route('backend.product.index',['type' => 'active']) }}" class="nav-link ">
                    <i class="fa fa-fw fa-product-hunt"></i>
                    <span class="title">Active Products</span>
                    <span class="arrow"></span>
                </a>
            </li>
            <li class="nav-item ">
                <a href="{{ route('backend.product.index',['type' => 'on_sale']) }}" class="nav-link ">
                    <i class="fa fa-fw fa-percent"></i>
                    <span class="title">On Sale Products</span>
                    <span class="arrow"></span>
                </a>
            </li>
            <li class="nav-item ">
                <a href="{{ route('backend.product.create') }}" class="nav-link ">
                    <i class="fa fa-fw fa-plus-square"></i>
                    <span class="title">Create New Product</span>
                    <span class="arrow"></span>
                </a>
            </li>
            <li class="nav-item ">
                <a href="{{ route('backend.product.trashed') }}" class="nav-link ">
                    <i class="fa fa-fw fa-recycle"></i>
                    <span class="title">Trashed</span>
                    <span class="arrow"></span>
                </a>
            </li>
        </ul>
    </li>
@endcan
@can('index','service')
    <li class="nav-item {{ activeItem('service') }}">
        <a href="{{ route('backend.service.index') }}" class="nav-link nav-toggle">
            <i class="fa fa-fw fa-clock-o"></i>
            <span class="title">{{ trans('general.services') }}</span>
            <span class="arrow"></span>
        </a>
    </li>
@endcan
@can('index','classified')
    <li class="nav-item {{ activeItem('classified') }}">
        <a href="{{ route('backend.classified.index') }}" class="nav-link ">
            <i class="fa fa-fw fa-file-image-o"></i>
            <span class="title">{{ trans('general.classifieds') }}</span>
            <span class="arrow"></span>
        </a>
    </li>
@endcan
@can('index','order')
    <li class="nav-item {{ activeItem('order') }}">
        <a href="{{ route('backend.order.index',['paid' => true]) }}" class="nav-link nav-toggle">
            <i class="fa fa-fw fa-money"></i>
            <span class="title">{{ trans('general.orders') }}</span>
            <span class="arrow"></span>
        </a>
        <ul class="sub-menu">
            <li class="nav-item ">
                <a href="{{ route('backend.order.index') }}" class="nav-link nav-toggle">
                    <i class="fa fa-fw fa-pie-chart"></i>
                    <span class="title">{{ trans('general.orders') }}</span>
                    <span class="arrow"></span>
                </a>
            </li>
            <li class="nav-item ">
                <a href="{{ route('backend.order.index',['paid' => true]) }}" class="nav-link nav-toggle">
                    <i class="fa fa-fw fa-pie-chart"></i>
                    <span class="title">{{ trans('general.paid_orders') }}</span>
                    <span class="arrow"></span>
                </a>
            </li>
            <li class="nav-item ">
                <a href="{{ route('backend.order.index',['status' => 'completed']) }}"
                   class="nav-link nav-toggle">
                    <i class="fa fa-fw fa-pie-chart"></i>
                    <span class="title">{{ trans('general.completed_orders') }}</span>
                    <span class="arrow"></span>
                </a>
            </li>
            <li class="nav-item ">
                <a href="{{ route('backend.order.index',['status' => 'failed']) }}" class="nav-link nav-toggle">
                    <i class="fa fa-fw fa-pie-chart"></i>
                    <span class="title">{{ trans('general.failed_orders') }}</span>
                    <span class="arrow"></span>
                </a>
            </li>
        </ul>
    </li>
@endcan
