<div class="col-sm-12 col-md-6">
    <div class="tt-table-responsive" style="margin-top : 20px;">
        <table class="table">
            @if(!is_null($element->settup_time) && $element->setup_time)
                <tr>
                    <td><i class="fa fa-fw fa-clock-o"></i><span class="m-1"></span>{{ trans('general.setup_time') }}:sss</td>
                    <td>{{ $element->setup_time }} {{ trans('general.hours') }}</td>
                </tr>
            @endif
            @if(!is_null($element->duration) && $element->duration)
                <tr>
                    <td><i class="fa fa-fw fa-clock-o"></i><span class="m-1"></span>{{ trans('general.duration') }}:</td>
                    <td>{{ $element->duration }} {{ trans('general.hours') }}</td>
                </tr>
            @endif
            @if(!is_null($element->delivery_time) && $element->delivery_time)
                <tr>
                    <td><i class="fa fa-fw fa-clock-o"></i><span class="m-1"></span>{{ trans('general.delivery_time') }}:sss</td>
                    <td>{{ $element->delivery_time }} {{ trans('general.hours') }}</td>
                </tr>
            @endif
        </table>
    </div>
</div>