<div class="tt-filters-options desctop-no-sidebar">
    {{--<div class="tt-btn-toggle">--}}
    {{--<a href="#">{{ trans('general.filter') }}</a>--}}
    {{--</div>--}}
    <div class="tt-sort">
        <select id="sort">
            <option value="" selected>{{ trans('general.sort_by') }}</option>
            <option value="name">{{ trans('general.sort_by_alpha') }}</option>
            <option value="desc">{{ trans('general.sort_by_price_high_to_low') }}</option>
            <option value="asc">{{ trans('general.sort_by_price_low_to_high') }}</option>
        </select>
    </div>
</div>

@section('scripts')
    @parent
    <script type="text/javascript">
        $('#sort').on('change', function(e) {
            var sort = e.target.value;
            console.log('the sort', sort)
            window.location.replace('{!! request()->getUri()!!}?&sort=' + sort);
        });
    </script>
@endsection