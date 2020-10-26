@if(str_contains(request()->route()->getName(),'backend'))
    @include('backend.partials.breadcrumbs')
@else
    @if (count($breadcrumbs) > 0)
        <div class="tt-breadcrumb">
            <div class="container">
                <ul>
                    @foreach ($breadcrumbs as $breadcrumb)
                        @if ($breadcrumb->url && !$loop->last)
                            <li style="display: inline"><a href="{{ $breadcrumb->url }}">{{ $breadcrumb->title }} </a> /
                            </li>
                        @else
                            <li  style="display: inline;">{{ $breadcrumb->title }}</li>
                        @endif
                    @endforeach
                </ul>
            </div>
        </div>
    @endif
@endif
