<div class="page-bar">
    <ul class="page-breadcrumb">
        <li>
            <a href="#">Home</a>
            <i class="fa fa-circle"></i>
        </li>
        <li>
            {{--{{ $link = '' }}--}}
            {{--@foreach($breadCrumbs as $key => $value)--}}
                {{--<a href="{{ $link .= '/'.$value }}">{{$value}}</a>--}}
                {{--<i class="fa fa-arrow-right"></i>--}}
            {{--@endforeach--}}
        </li>
    </ul>
</div>
<div class="row" style="margin-top: 5px;">
    @include('backend.partials.notifications')
</div>
