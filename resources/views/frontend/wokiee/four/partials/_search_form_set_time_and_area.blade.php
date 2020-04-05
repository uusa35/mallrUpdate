@if($countries->where('is_local',true)->first())
    <form method="get" action="{{ route("frontend.service.set") }}">
        <input type="hidden" name="save" value="1">
        <input type="hidden" name="day_selected" id="day_selected" value="">
        <input type="hidden" name="day_selected_format" id="day_selected_format" value="">
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
            <div class="form-group col-lg-4 col-xs-12">
                <label for="area_id" class="sr-only ">{{ trans('general.areas') }}*</label>
                <select class="areas form-control" name="area_id" required style="height : 300px;">
                    <option value="">{{ trans('general.choose_area') }}*</option>
                    @foreach($countries->where('is_local', true)->first()->governates as $gov)
                        <optgroup label="{{ $gov->slug }}" style="background-color: #b52600 !important;">
                            @foreach($gov->areas as $area)
                                <option value="{{ $area->id }}" {{ session()->has('area_id') && session()->get('area_id') == $area->id ? 'selected' : null }}>{{ $area->slug }}</option>
                            @endforeach
                        </optgroup>
                    @endforeach
                </select>

            </div>
            @if(isset($timings))
                <div class="form-group col-lg-3 col-xs-12">
                    <label for="timings" class="sr-only">{{ trans('general.timing') }}</label>
                    <select name="timing_id" class="form-control">
                        <option value="" selected>{{ trans('general.choose_timing') }}</option>
                        @foreach($timings as $k => $v)
                            <option value="{{ Carbon\Carbon::parse($v)->format('h:i a') }}">{{ $v }}</option>
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