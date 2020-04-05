@if($element->timings->isNotEmpty())
    <div class="tt-table-responsive">
        <table class="tt-table-shop-01">
            <thead>
            <tr style="background-color : #f7f7f7;">
                <th>{{ trans('general.day') }}</th>
                <th>{{ trans('general.start_timing') }}</th>
                <th>{{ trans('general.end_timing') }}</th>
            </tr>
            </thead>
            <tbody>
            @foreach($element->timings->sortBy('day_no')->groupBy('day') as $key => $set)
                @foreach($set as $timing)
                    <tr>
                        <td style="border-top: {{ !$loop->first ? '1px solid white!important;' : null }};"><strong>{{ $loop->first ? $timing->day_name : null }}</strong></td>
                        <td>{{ $timing->startDuty }}</td>
                        <td>{{ $timing->endDuty }}</td>
                    </tr>
                @endforeach
            @endforeach
            </tbody>
        </table>
    </div>
@endif