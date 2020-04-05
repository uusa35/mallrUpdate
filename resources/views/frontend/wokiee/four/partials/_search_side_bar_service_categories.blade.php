@if(isset($categoriesList) && $categoriesList->isNotEmpty())
    <div class="tt-collapse open">
        <h3 class="tt-collapse-title">{{ trans('general.filter_by_service_categories') }}</h3>
        <div class="tt-collapse-content">
            <ul class="tt-filter-list ">
                @foreach($categoriesList as $category)
                    <li>
                        <a class="{{ request('service_category_id') == $category->id ? 'text-warning' : null }}" href="{!! request()->fullUrlWithQuery(['service_category_id' => $category->id]) !!}">{{ $category->name }}</a>
                    </li>
                    {{--@if($category->children->isNotEmpty())--}}
                        {{--<ul>--}}
                            {{--@foreach($category->children as $child)--}}
                                {{--<li>--}}
                                    {{--<a href="{!! request()->fullUrlWithQuery(['service_category_id' => $child->id]) !!}">{{ $child->name }}</a>--}}
                                {{--</li>--}}
                            {{--@endforeach--}}
                        {{--</ul>--}}
                    {{--@endif--}}
                @endforeach
            </ul>
            <a href="{{ getRequestQueryUrlWithout('service_category_id') }}"
               class="btn-link-02">{{ trans("general.clear") }}</a>
        </div>
    </div>
@endif