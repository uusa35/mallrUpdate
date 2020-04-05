@extends('backend.layouts.app')


@section('breadcrumbs')
    {{ Breadcrumbs::render('backend.admin.color.edit', $element) }}
@endsection
@section('content')
    <div class="portlet box blue">
        @include('backend.partials.forms.form_title',['title' => trans('general.edit_color')])
        <div class="portlet-body">
            @include('backend.partials._admin_instructions',['title' => trans('general.colors') ,'message' => trans('message.edit_color')])
            <div class="portlet-body form">
                <form class="horizontal-form" role="form" method="POST" action="{{ route('backend.admin.color.update', $element->id) }}" enctype="multipart/form-data">
                    @csrf
                    @method('put')
                    <div class="form-body">
                        <h3 class="form-section">{{ trans('general.edit_color') }}</h3>
                        <div class="portlet box blue ">
                            <div class="portlet-title">
                                <div class="caption">
                                    <i class="fa fa-gift"></i> {{ trans('general.main_details') }}
                                </div>
                            </div>
                            <div class="portlet-body form">
                                <div class="form-body">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group {{ $errors->has('name_ar') ? ' has-error' : '' }}">
                                                <label for="name_ar" class="control-label">{{ trans('general.name_ar') }}*</label>
                                                <input id="name_ar" type="text" class="form-control tooltips" data-container="body" data-placement="top" data-original-title="{{ trans('message.name_ar') }}" name="name_ar" value="{{ $element->name_ar }}" placeholder="{{ trans('general.name_ar') }}" required autofocus>
                                                @if ($errors->has('name_ar'))
                                                    <span class="help-block">
                                                <strong>
                                                    {{ $errors->first('name_ar') }}
                                                </strong>
                                            </span>
                                                @endif
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group{{ $errors->has('name_en') ? ' has-error' : '' }}">
                                                <label for="name_en" class="control-label">{{ trans('general.name_en') }}*</label>
                                                <input id="name_en" type="text" class="form-control tooltips" data-container="body" data-placement="top" data-original-title="{{ trans('message.name_en') }}" name="name_en" value="{{ $element->name_en }}" placeholder="{{ trans('general.name_en') }}" required autofocus>
                                                @if ($errors->has('name_en'))
                                                    <span class="help-block">
                                                <strong>
                                                    {{ $errors->first('name_en') }}
                                                </strong>
                                            </span>
                                                @endif
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group {{ $errors->has('code') ? ' has-error' : '' }}">
                                                <label for="code" class="control-label">{{ trans('general.code') }}*</label>
                                                <input type="text" id="hue-demo" class="form-control tooltips demo" data-container="body" data-placement="top" data-original-title="{{ trans('message.code') }}" data-control="hue" name="code" value="{{ $element->code }}" required>
                                                @if ($errors->has('code'))
                                                    <span class="help-block">
                                                <strong>
                                                    {{ $errors->first('code') }}
                                                </strong>
                                            </span>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="portlet box blue ">
                            <div class="portlet-title">
                                <div class="caption">
                                    <i class="fa fa-gift"></i> {{ trans('general.more_details') }}
                                </div>
                            </div>
                            <div class="portlet-body form">
                                <div class="form-body">
                                    <div class="row">

                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label class="control-label sbold tooltips" data-container="body" data-placement="top" data-original-title="{{ trans('message.active') }}">{{ trans('general.active') }}</label></br>
                                                <label class="radio-inline">
                                                    <input type="radio" name="active" id="optionsRadios3" checked value="1"> {{ trans('general.yes') }}</label>
                                                <label class="radio-inline">
                                                    <input type="radio" name="active" id="optionsRadios4" value="0"> {{ trans('general.no') }}</label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @include('backend.partials.forms._btn-group')
            </div>
        </div>
    </div>
    </form>
    </div>
    </div>
@endsection