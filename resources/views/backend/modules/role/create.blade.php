@extends('backend.layouts.app')
@section('breadcrumbs')
{{ Breadcrumbs::render('backend.admin.role.create') }}
@endsection

@section('content')
<div class="portlet box blue">
    @include('backend.partials.forms.form_title')
    <div class="portlet-body">
        @include('backend.partials._admin_instructions',['title' => trans('general.roles') ,'message' => trans('message.admin_role_message')])
        <div class="portlet-body form">
            <form class="horizontal-form" role="form" method="POST" action="{{ route('backend.admin.role.store') }}" enctype="multipart/form-data">
                @csrf
                <div class="form-body">
                    <h3 class="form-section">{{ trans('general.new_role') }}</h3>
                    <div class="portlet box blue ">
                        <div class="portlet-title">
                            <div class="caption">
                                <i class="fa fa-gift"></i> {{ trans('general.role_main_details') }}
                            </div>
                        </div>
                        <div class="portlet-body form">
                            <div class="form-body">
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label class="control-label">{{ trans('general.name') }}</label>
                                            <input type="text" id="name" class="form-control" placeholder="{{ trans('general.name') }}" value="{{ old('name_ar') }}" name="name" required>
                                            <span class="help-block"> Role Name must be unique </span>
                                        </div>
                                    </div>
                                    <!--/span-->
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label class="control-label">{{ trans('general.slug_ar') }}</label>
                                            <input type="text" id="slug_ar" name="slug_ar" class="form-control" value="{{ old('slug_ar') }}" placeholder="{{ trans('general.slug_ar') }}" required>
                                            {{--<span class="help-block"> This field has error. </span>--}}
                                        </div>
                                    </div>


                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label class="control-label">{{ trans('general.slug_en') }}</label>
                                            <input type="text" id="slug_en" name="slug_en" class="form-control" value="{{ old('slug_en') }}" placeholder="{{ trans('general.slug_en') }}" required>
                                            {{--<span class="help-block"> This field has error. </span>--}}
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label class="control-label">{{ trans('general.caption_ar') }}</label>
                                            <input type="text" id="caption_ar" name="caption_ar" class="form-control" value="{{ old('caption_ar') }}" placeholder="{{ trans('general.caption_ar') }}" required>
                                            {{--<span class="help-block"> This field has error. </span>--}}
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label class="control-label">{{ trans('general.caption_en') }}</label>
                                            <input type="text" id="caption_en" name="caption_en" class="form-control" value="{{ old('caption_en') }}" placeholder="{{ trans('general.caption_en') }}" required>
                                            {{--<span class="help-block"> This field has error. </span>--}}
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group{{ $errors->has('order') ? ' has-error' : '' }}">
                                            <label for="order" class="control-label">{{ trans('general.order') }} *</label>
                                            <input id="order" type="number" class="form-control" name="order" value="{{ old('order') }}" placeholder="{{ trans('general.order') }}" maxlength="2" autofocus>
                                            @if ($errors->has('order'))
                                            <span class="help-block">
                                                <strong>
                                                    {{ $errors->first('order') }}
                                                </strong>
                                            </span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group {{ $errors->has('color') ? ' has-error' : '' }}">
                                            <label for="color" class="control-label">{{ trans('general.color') }}*</label>
                                            <input type="text" id="hue-demo" class="form-control demo" data-control="hue" name="color" value="#ff6161">
                                            @if ($errors->has('color'))
                                            <span class="help-block">
                                                <strong>
                                                    {{ $errors->first('color') }}
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
                                <i class="fa fa-gift"></i> {{ trans('general.role_attributes_details') }}
                            </div>
                        </div>
                        <div class="portlet-body form">
                            <div class="form-body">
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label class="control-label sbold">{{ trans('general.active') }}</label>
                                                <div class="radio-list">
                                                    <label class="radio-inline">
                                                        <input type="radio" name="active" id="optionsRadios1" value="1" checked> {{ trans('general.yes') }} </label>
                                                    <label class="radio-inline">
                                                        <input type="radio" name="active" id="optionsRadios2" value="0">
                                                        {{ trans('general.no') }}</label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!--/span-->
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label class="control-label sbold">{{ trans('general.is_admin') }}</label>
                                            <div class="radio-list">
                                                <label class="radio-inline">
                                                    <input type="radio" name="is_admin" id="optionsRadios3" value="1">
                                                    {{ trans('general.yes') }}</label>
                                                <label class="radio-inline">
                                                    <input type="radio" name="is_admin" id="optionsRadios4" value="0" checked> {{ trans('general.no') }}</label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label class="control-label sbold">{{ trans('general.is_super') }}</label>
                                            <div class="radio-list">
                                                <label class="radio-inline">
                                                    <input type="radio" name="is_super" id="optionsRadios3" value="1">
                                                    {{ trans('general.yes') }}</label>
                                                <label class="radio-inline">
                                                    <input type="radio" name="is_super" id="optionsRadios4" value="0" checked> {{ trans('general.no') }}</label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label class="control-label sbold">{{ trans('general.is_client') }}</label>
                                            <div class="radio-list">
                                                <label class="radio-inline">
                                                    <input type="radio" name="is_client" id="optionsRadios3" value="1">
                                                    {{ trans('general.yes') }}</label>
                                                <label class="radio-inline">
                                                    <input type="radio" name="is_client" id="optionsRadios4" value="0" checked> {{ trans('general.no') }}</label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label class="control-label sbold">{{ trans('general.is_designer') }}</label>
                                            <div class="radio-list">
                                                <label class="radio-inline">
                                                    <input type="radio" name="is_designer" id="optionsRadios3" value="1">
                                                    {{ trans('general.yes') }}</label>
                                                <label class="radio-inline">
                                                    <input type="radio" name="is_designer" id="optionsRadios4" value="0" checked> {{ trans('general.no') }}</label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label class="control-label sbold">{{ trans('general.is_visible') }}</label>
                                                <div class="radio-list">
                                                    <label class="radio-inline">
                                                        <input type="radio" name="is_visible" id="optionsRadios5" value="1" checked> {{ trans('general.yes') }} </label>
                                                    <label class="radio-inline">
                                                        <input type="radio" name="is_visible" id="optionsRadios6" value="0"> {{ trans('general.no') }}</label>
                                                </div>
                                                <span class="help-block"> Visible Means that this role shall appear on Application (ex. admin is invisible)</span>
                                            </div>
                                        </div>
                                    </div>
                                    <!--/span-->
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label class="control-label sbold">{{ trans('general.is_company') }}</label>
                                            <div class="radio-list">
                                                <label class="radio-inline">
                                                    <input type="radio" name="is_company" id="optionsRadios7" value="1">
                                                    {{ trans('general.yes') }}</label>
                                                <label class="radio-inline">
                                                    <input type="radio" name="is_company" id="optionsRadios8" value="0" checked> {{ trans('general.no') }}</label>
                                            </div>
                                            <span class="help-block"> Role that has companies attributes (ex. branches) </span>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label class="control-label sbold">{{ trans('general.is_celebrity') }}</label>
                                            <div class="radio-list">
                                                <label class="radio-inline">
                                                    <input type="radio" name="is_celebrity" id="optionsRadios7" value="1">
                                                    {{ trans('general.yes') }}</label>
                                                <label class="radio-inline">
                                                    <input type="radio" name="is_celebrity" id="optionsRadios8" value="0" checked> {{ trans('general.no') }}</label>
                                            </div>
                                            <span class="help-block"> Role that has companies attributes (ex. branches) </span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                @include('backend.partials.forms._btn-group')
            </form>
        </div>
    </div>
    @endsection