@if(isset($pages) && $pages->isNotEmpty())
    @foreach($pages->where('on_menu_desktop',true)->take(3) as $page)
        <li class="dropdown">
            <a href="{{ $page->url ? $page->url : route('frontend.page.show.name',['id' => $page->id,'name' => $page->title]) }}">
                {{ \Illuminate\Support\Str::limit($page->title,20,'') }}
            </a>
        </li>
    @endforeach
@endif
