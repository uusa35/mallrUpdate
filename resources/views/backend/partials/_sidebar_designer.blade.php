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