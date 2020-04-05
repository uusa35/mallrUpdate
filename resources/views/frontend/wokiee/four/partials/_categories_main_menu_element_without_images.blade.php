<li class="dropdown tt-megamenu-col-01">
@foreach($categories->where('is_parent', true) as $category)
    <li class="dropdown tt-megamenu-col-01">
        <a href="{{ route('frontend.search',['category_id']) }}">{{ $category->name }}</a>
        @if($category->children->isNotEmpty())
            <div class="dropdown-menu">
                <div class="row tt-col-list">
                    @foreach($category->children as $sub)
                        <div class="col">
                            <h6 class="tt-title-submenu">
                                <a
                                        href="{{ route('frontend.search',['category_id' => $sub->id]) }}">
                                    {{ $sub->name }}
                                </a>
                            </h6>
                            @if($sub->children->isNotEmpty())
                                <ul class="tt-megamenu-submenu">
                                    @foreach($sub->children as $child)
                                        <li>
                                            <a href="{{ route('frontend.search',['category_id' => $child->name]) }}">{{ $child->name }}</a>
                                        </li>
                                    @endforeach
                                </ul>
                            @endif
                        </div>
                    @endforeach
                </div>
            </div>
        @endif
    </li>
@endforeach