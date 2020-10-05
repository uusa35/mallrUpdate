@if(isset($pages) && $pages->isNotEmpty())
    @foreach($pages->where('on_menu_desktop',true)->take(4) as $page)
        <li class="dropdown">
            <a href="{{ $page->url ? $page->url : route('frontend.page.show.name',['id' => $page->id,'name' => $page->title]) }}">
                {{ str_limit($page->title,10,'') }}
            </a>
        </li>
    @endforeach
@endif
