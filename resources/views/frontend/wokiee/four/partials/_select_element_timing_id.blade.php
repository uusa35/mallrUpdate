<div class="form-group">
    <label for="timing_start">{{ trans('general.select_timing') }}
        <sup>*</sup></label>
    <select name="timing_id" id="timing_select" class="form-control" required>
        <option value="0" selected="selected">{{ trans("general.timings_available_for_chosen_date_and_service") }}</option>
        @foreach($element->timings as $timing)
            <option
                    class="timing-element-{{ $timing->day_no }} d-none"
                    value="{{ $timing->id }}">{{ \Carbon\Carbon::parse($timing->start)->format('H:i A') }}</option>
        @endforeach
    </select>
</div>
{{--<input type="hidden" name="timing_id" id="timing_id" value="">--}}