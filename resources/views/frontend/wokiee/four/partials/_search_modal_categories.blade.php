{{-- HomePage Modal--}}
<div class="modal  fade" id="Modalnewsletter" tabindex="-1" role="dialog" aria-label="myModalLabel" aria-hidden="true"
     data-pause=2000>
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true"><span
                            class="icon icon-clear"></span></button>
            </div>
            <div class="modal-body">
                <div class="card">
                    <div class="card-header">
                        {{ trans('general.search_your_occasion') }}
                    </div>
                    <div class="card-body">
                        <h5 class="card-title">{{ trans('general.sub_title_your_occasion') }}</h5>
                        <p class="card-text">
                            {{ trans('message.search_your_occasion') }}
                        </p>
                        <br>
                        @if($countries->where('is_local',true)->first())
                            <form method="get" action="{{ route("frontend.service.search") }}">
                                <input type="hidden" name="save" value="1">
                                <input type="hidden" name="day_selected_format" id="day_selected_format"
                                       value="{{ getDaySelected_format() }}">
                                <input type="hidden" name="day_selected" id="day_selected"
                                       value="{{ getDaySelected() }}">
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
                                        <label for="area_id" class="sr-only">{{ trans('general.area') }}*</label>
                                        <select name="area_id" class="form-control" required>
                                            <option value="">{{ trans('general.choose_area') }}*</option>
                                            @foreach($countries->where('is_local', true)->first()->areas as $area)
                                                <option value="{{ $area->id }}" {{ session()->has('area_id') && session()->get('area_id') == $area->id ? 'selected' : null }}>{{ $area->slug }}</option>
                                            @endforeach
                                        </select>
                                    </div>
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
                                </div>
                                @if(env('EVENTKM'))
                                    <div class="row">
                                        <div class="col-12">
                                            <h4>{{ trans('general.categories') }}</h4>
                                        </div>
                                        @if($categoriesList->isNotEmpty())
                                            @foreach($categoriesList as $category)
                                                <div class="col-4 {{ app()->isLocale('ar') ? 'text-right' : 'text-left' }}"
                                                     style="margin-top: 10px;">
                                                    <div class="form-check">
                                                        <input type="checkbox"
                                                               name="categories[]"
                                                               value="{{ $category->id }}"
                                                               @if(request()->has('categories'))
                                                               {{ in_array($category->id,request()->categories, false) ? 'checked' : null }}
                                                               @endif
                                                               class="orm-check-input"/>
                                                        &nbsp;&nbsp;
                                                        <label class="form-check-label"
                                                               for="categories">{{ \Illuminate\Support\Str::limit($category->name,60) }}</label>
                                                    </div>
                                                </div>
                                            @endforeach
                                        @endif
                                    </div>
                                    <div class="row">
                                        <div class="col-12">
                                            <h4>{{ trans('general.companies') }}</h4>
                                        </div>
                                        @if($categoriesList->isNotEmpty() && $vendors->isNotEmpty())
                                            @foreach($vendors as $vendor)
                                                <div class="col-4 {{ app()->isLocale('ar') ? 'text-right' : 'text-left' }}"
                                                     style="margin-top: 10px;">
                                                    <div class="form-check">
                                                        <input type="checkbox"
                                                               name="users[]"
                                                               value="{{ $vendor->id }}"
                                                               @if(request()->has('users'))
                                                               {{ in_array($vendor->id,request()->users, false) ? 'checked' : null }}
                                                               @endif
                                                               class="orm-check-input"/>
                                                        &nbsp;&nbsp;
                                                        <label class="form-check-label"
                                                               for="categories">{{ \Illuminate\Support\Str::limit($vendor->slug,60) }}</label>
                                                    </div>
                                                </div>
                                            @endforeach
                                        @endif
                                    </div>
                                @endif
                                <div class="form-group col-12 col-xs" style="padding: 20px;">
                                    <button type="submit"
                                            class="btn btn-primary {{ app()->isLocale('ar') ?  'pull-left' : 'pull-right '}}">{{ trans('general.search') }}</button>
                                </div>
                            </form>
                        @endif


                        {{--@if(env('APP_CASE') === 'evento')--}}
                        {{--<div class="row">--}}
                        {{--<div class="tt-offset-35 container-indent element-padding-bottom">--}}
                        {{--<div class="container">--}}
                        {{--<div class="row tt-services-listing">--}}
                        {{--@foreach($categoriesList as $category)--}}
                        {{--<div class="col-xs-12 col-md-6 col-lg-4">--}}
                        {{--<a href="{!! request()->fullUrlWithQuery(['service_category_id' => $category->id]) !!}"--}}
                        {{--class="tt-services-block"--}}
                        {{--style="border: 1px solid lightgrey; border-radius: 5px;">--}}
                        {{--<div class="badge-light">--}}
                        {{--                                                            <i class="fa fa-fw fa-3x {{ $category->icon }}"></i>--}}
                        {{--<img class="img-responsive img-rounded"--}}
                        {{--style="width : 80px; padding: 5px;"--}}
                        {{--src="{{ $category->imageThumbLink }}"--}}
                        {{--alt="{{ $category->name }}">--}}
                        {{--</div>--}}
                        {{--<div class="tt-col-description">--}}
                        {{--<div class="tt-title {{ request('service_category_id') == $category->id ? 'text-warning' : null }}">{{ \Illuminate\Support\Str::limit($category->name,'40') }}</div>--}}
                        {{--<div>{{ trans('general.services_count') }}--}}
                        {{--: {{ $category->services->count() }} </div>--}}
                        {{--</div>--}}
                        {{--</a>--}}
                        {{--</div>--}}
                        {{--@endforeach--}}
                        {{--</div>--}}
                        {{--</div>--}}
                        {{--</div>--}}
                        {{--</div>--}}
                        {{--@endif--}}
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>
