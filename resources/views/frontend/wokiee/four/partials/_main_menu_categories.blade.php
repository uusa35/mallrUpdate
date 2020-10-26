@if(isset($categories) && $categories->isNotEmpty())
    <div class="tt-col-obj tt-obj-menu-categories tt-desctop-parent-menu-categories">
        <div class="tt-menu-categories">
            <button class="tt-dropdown-toggle">
                {{ trans('general.categories') }}
            </button>
            <div class="tt-dropdown-menu">
                <nav>
                    <ul>
                        @foreach($categories->where('is_product',true)->where('is_parent', true)->where('on_home', true) as $cat)
                            <li>
                                <a href="{{ route('frontend.product.search',['product_category_id' => $cat->id]) }}">
                                    <i class="icon-women"></i>
                                    <span>{{ str_limit($cat->name,15,'') }}</span>
                                </a>
                                @if($cat->children->isNotEmpty())
                                    <div class="dropdown-menu size-md">
                                        <div class="dropdown-menu-wrapper">
                                            <div class="row">
                                                <div class="col-12">
                                                    <div class="row tt-col-list">
                                                        @foreach($cat->children as $sub)
                                                            <div class="col-sm-4">
                                                                <a class="tt-title-submenu"
                                                                   href="{{ route('frontend.product.search',['product_category_id' => $sub->id]) }}">
                                                                    {{ $sub->name }}
                                                                </a>
                                                                @if($sub->children->isNotEmpty())
                                                                    <ul class="tt-megamenu-submenu">
                                                                        @foreach($sub->children as $child)
                                                                            <li>
                                                                                <a href="{{ route('frontend.product.search',['product_category_id' => $child->id]) }}">
                                                                                    {{ $child->name }}
                                                                                    @if($child->on_new)
                                                                                        <span class="tt-badge tt-new">{{ trans('general.new') }}</span>
                                                                                    @endif
                                                                                </a>
                                                                            </li>
                                                                        @endforeach
                                                                    </ul>
                                                                @endif
                                                            </div>
                                                        @endforeach
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endif
                            </li>
                        @endforeach
                    </ul>
                </nav>
            </div>
        </div>
    </div>
@endif
