<div class="modal  fade" id="chooseTimeModal" tabindex="-1" role="dialog" aria-label="chooseTimeModalLabel"
     aria-hidden="true">
    <div class="modal-dialog modal-sm">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true"><span
                            class="icon icon-clear"></span></button>
            </div>
            <div class="modal-body col">
                <h4>{{ trans('general.available_timings') }}</h4>
                <div class="tt-table-responsive">
                    <table class="tt-table-shop-01">
                        <tbody>
                        @foreach($element->timings as $timing)
                            <tr class="timing-element-{{ $timing->day_no }}" class="d-none">
                                {{--<td>{{ $timing->day_name }}</td>--}}
                                {{--<td>{{ \Carbon\Carbon::parse($timing->start)->format('h:m A') }}</td>--}}
                                {{--                                <td>{{ \Carbon\Carbon::parse($timing->end)->format('h:m A') }}</td>--}}
                                {{--<td>{{ $timing->notes }}</td>--}}
                                <td
                                        data-tooltip="{{ trans('general.notes') }} : {{ $timing->notes }}"
                                ><a href="#" class="btn timing-start-end-{{ $element->id }} btn-small" data-dismiss="modal"
                                    style="color : white!important;"
                                    data-id="{{ $timing->id }}"
                                    data-service-id="{{ $element->id }}"
                                    data-service-name="{{ $element->name }}"
                                    data-day-name="{{ $timing->day_name }}"
                                    data-timing-start="{{ $timing->start }}"
                                    data-timing-end="{{ $timing->end }}"
                                    data-date=""
                                    >
                                        {{--<i class="fa fa-fw icon-f-55 fa-lg"></i>--}}
                                        &nbsp;{{ trans('general.service_start_time') }} :
                                        {{ \Carbon\Carbon::parse($timing->start)->format('h:m A') }}
                                    </a></td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>