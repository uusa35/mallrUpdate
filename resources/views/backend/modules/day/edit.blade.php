@extends('backend.layouts.app')

@section('breadcrumbs')
    {{ Breadcrumbs::render('backend.admin.day.edit', $element) }}
@endsection

@section('content')
    <div class="portlet box blue">
        @include('backend.partials.forms.form_title',['title' => trans('general.new_day')])
        <div class="portlet-body">
            @include('backend.partials._admin_instructions',['title' => trans('general.days') ,'message' =>
            trans('message.new_day')])
            <div class="portlet-body form">
                <form class="horizontal-form" role="form" method="POST" action="{{ route('backend.admin.day.update', $element->id) }}"
                      enctype="multipart/form-data">
                    @csrf
                    @method('put')
                    <div class="form-body">
                        <h3 class="form-section">{{ trans('general.edit') .' ' . trans('general.day') }}</h3>
                        <div class="portlet box blue ">
                            <div class="portlet-title">
                                <div class="caption">
                                    <i class="fa fa-gift"></i> {{ trans('general.main_details') }}
                                </div>
                            </div>
                            <div class="portlet-body form">
                                <div class="form-body">
                                    <div class="row">

                                        <div class="col-md-3">
                                            <div class="form-group {{ $errors->has('day_name_en') ? ' has-error' : '' }}">
                                                <label for="day_name_en"
                                                       class="control-label">{{ trans('general.day_name_en') }}
                                                    *</label>
                                                <input id="day_name_en" type="text" class="form-control tooltips"
                                                       data-container="body" data-placement="top"
                                                       data-original-title="{{ trans('message.day_name_en') }}"
                                                       name="day_name_en" value="{{ $element->day_name_en }}"
                                                       placeholder="{{ trans('general.day_name_en') }}" required autofocus>
                                                @if ($errors->has('day_name_en'))
                                                    <span class="help-block">
                                                <strong>
                                                    {{ $errors->first('day_name_en') }}
                                                </strong>
                                            </span>
                                                @endif
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group {{ $errors->has('name_en') ? ' has-error' : '' }}">
                                                <label for="name_en"
                                                       class="control-label">{{ trans('general.day_name_ar') }}
                                                    *</label>
                                                <input id="day_name_ar" type="text" class="form-control tooltips"
                                                       data-container="body" data-placement="top"
                                                       data-original-title="{{ trans('message.day_name_ar') }}"
                                                       name="day_name_ar" value="{{ $element->day_name_ar }}"
                                                       placeholder="{{ trans('general.day_name_ar') }}" required autofocus>
                                                @if ($errors->has('day_name_ar'))
                                                    <span class="help-block">
                                                <strong>
                                                    {{ $errors->first('day_name_ar') }}
                                                </strong>
                                            </span>
                                                @endif
                                            </div>
                                        </div>
                                        <div class="col-md-2">
                                            <div class="form-group {{ $errors->has('day_no') ? ' has-error' : '' }}">
                                                <label for="day_no"
                                                       class="control-label">{{ trans('general.sequence') }}
                                                    *</label>
                                                <input id="day_no" type="text" class="form-control tooltips"
                                                       data-container="body" data-placement="top"
                                                       data-original-title="{{ trans('message.day_no') }}"
                                                       name="day_no" value="{{ $element->day_no }}"
                                                       placeholder="{{ trans('general.day_no') }}" autofocus disabled>
                                                @if ($errors->has('day_no'))
                                                    <span class="help-block">
                                                <strong>
                                                    {{ $errors->first('day_no') }}
                                                </strong>
                                            </span>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="form-body">
                        <div class="portlet box blue ">
                            <div class="portlet-title">
                                <div class="caption">
                                    <i class="fa fa-gift"></i> {{ trans('general.more_details') }}
                                </div>
                            </div>
                            <div class="portlet-body form">
                                <div class="form-body">
                                    <div class="row">
                                        <div class="col-lg-12">
                                            @include('backend.partials.forms._btn-group')
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
