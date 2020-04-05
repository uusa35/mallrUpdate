@if(isset($tags) && $tags->isNotEmpty())
    <div class="tt-collapse open">
        <h3 class="tt-collapse-title">{{ trans('general.tags') }}</h3>
        <div class="tt-collapse-content">
            <ul class="tt-list-inline">
                @foreach($tags as $tag)
                    <li><a href="{!! request()->fullUrlWithQuery(['tag_id' => $tag->id]) !!}">{{ $tag->name }}</a></li>
                @endforeach
            </ul>
        </div>
    </div>
@endif