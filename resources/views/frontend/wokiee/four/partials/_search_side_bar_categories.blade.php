<div class="tt-collapse open">
    <h3 class="tt-collapse-title">{{ trans('general.filter_by_categories') }}</h3>
    <div class="tt-collapse-content">
        <ul class="tt-filter-list">
            @foreach($categoriesList as $category)
                <li class="active">
                    <a href="{!! request()->fullUrlWithQuery(['category_id' => $category->id]) !!}">{{ $category->name }}</a>
                </li>
                {{--@if($category->children->isNotEmpty())--}}
                    {{--<ul>--}}
                        {{--@foreach($category->children as $child)--}}
                            {{--<li>--}}
                                {{--<a href="{!! request()->fullUrlWithQuery(['category_id' => $child->id]) !!}">{{ $child->name }}</a>--}}
                            {{--</li>--}}
                        {{--@endforeach--}}
                    {{--</ul>--}}
                {{--@endif--}}
            @endforeach
        </ul>
        <a href="#" class="btn-link-02">Clear All</a>
    </div>
</div>