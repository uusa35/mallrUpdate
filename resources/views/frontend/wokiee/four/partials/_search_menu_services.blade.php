@if($countries->where('is_local',true)->first())
    <form method="get" action="{{ route("frontend.service.search") }}">
        <input type="hidden" name="save" value="1">
        <input type="hidden" name="day_selected_format" id="day_selected_format"
               value="{{ getDaySelected_format() }}">
        <input type="hidden" name="day_selected" id="day_selected"
               value="{{ getDaySelected() }}">
        <input type="hidden" name="day_selected_format" id="day_selected_format"
               value="{{ session()->get("day_selected_format") }}">
        <div class="form-row justify-content-center align-items-center">
            <input type="hidden" name="country_id"
                   value="{{ $countries->where('is_local',true)->first()->id }}">
            <div class="form-group col-lg-3 col-xs-12">
                <label for="date_selected" class="sr-only">{{ trans('general.day') }}*</label>
                <input data-toggle="datepicker" type="text"
                       value="{{ getDaySelected_format() ? getDaySelected_format() : trans('general.choose_date') }}*"
                       class="form-control docs-datepicker-trigger-search"
                       placeholder="{{ trans('general.choose_day') }}" required>
            </div>

            <div class="form-group col-lg-3 col-xs-12">
                <label for="area_id" class="sr-only ">{{ trans('general.areas') }}*</label>
{{--                <select class="areas form-control" name="area_id" required style="height : 300px; width : 100% !important;">--}}
                <select class="form-control" name="area_id" required>
                    <option value="">{{ trans('general.choose_area') }}*</option>
                    @foreach($countries->where('is_local', true)->first()->governates as $gov)
                        <optgroup label="{{ $gov->slug }}">
                            @foreach($gov->areas as $area)
                                <option value="{{ $area->id }}" {{ session()->has('area_id') && session()->get('area_id') == $area->id ? 'selected' : null }}>{{ $area->slug }}</option>
                            @endforeach
                        </optgroup>
                    @endforeach
                </select>
            </div>
            {{--            <div class="form-group col-lg-3 col-xs-12">--}}
            {{--            <select name="area_id" class="form-control" required>--}}
            {{--                <option value="">{{ trans('general.choose_area') }}*</option>--}}
            {{--                @foreach($countries->where('is_local', true)->first()->areas as $area)--}}
            {{--                    <option value="{{ $area->id }}" {{ session()->has('area_id') && session()->get('area_id') == $area->id ? 'selected' : null }}>{{ $area->slug }}</option>--}}
            {{--                @endforeach--}}
            {{--            </select>--}}
            {{--            </div>--}}
            @if(isset($timings))
                <div class="form-group col-lg-3 col-xs-12">
                    <label for="timings" class="sr-only">{{ trans('general.timing') }}</label>
                    <select name="timing_value" class="form-control">
                        <option value="" selected>{{ trans('general.choose_timing') }}</option>
                        @foreach($timings as $k => $v)
                            <option value="{{ Carbon\Carbon::parse($v)->format('h:i a') }}" {{ getTimingValue() === $v ? 'selected' : null }}>{{ $v }}</option>
                        @endforeach
                    </select>
                </div>
            @endif
            <div class="form-group col-lg-3 col-xs-12">
                <button type="submit"
                        class="btn btn-primary">{{ trans('general.search') }}</button>
            </div>
        </div>
    </form>
@endif
