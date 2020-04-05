@extends('backend.layouts.app')

@section('breadcrumbs')
{{ Breadcrumbs::render('backend.admin.answer.create') }}
@endsection
@section('content')
<div class="portlet box blue">
    @include('backend.partials.forms.form_title')
    <div class="portlet-body">
        @include('backend.partials._admin_instructions',['title' => trans('general.answers') ,'message' => trans('message.admin_answer_message')])
        <div class="portlet-body form">
            <form class="horizontal-form" role="form" method="POST" action="{{ route('backend.admin.answer.store') }}" enctype="multipart/form-data">
                @csrf
                <div class="form-body">

                    <h3 class="form-section">{{ trans('general.create_answer') }}</h3>
                    <div class="portlet box blue ">
                        <div class="portlet-title">
                            <div class="caption">
                                <i class="fa fa-gift"></i> {{ trans('general.answer_main_details') }}
                            </div>
                        </div>
                        <div class="portlet-body form">
                            <div class="form-body">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group {{ $errors->has('name_ar') ? ' has-error' : '' }}">
                                            <label for="name_ar" class="control-label">{{ trans('general.name_ar') }}*</label>
                                            <input id="name_ar" type="text" class="form-control" name="name_ar" value="{{ old('name_ar') }}" placeholder="{{ trans('general.name_ar') }}" required autofocus>
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
                                            <input id="name_en" type="text" class="form-control" name="name_en" value="{{ old('name_en') }}" placeholder="{{ trans('general.name_en') }}" required autofocus>
                                            @if ($errors->has('name_en'))
                                            <span class="help-block">
                                                <strong>
                                                    {{ $errors->first('name_en') }}
                                                </strong>
                                            </span>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group {{ $errors->has('value') ? ' has-error' : '' }}">
                                            <label for="value" class="control-label">{{ trans('general.value') }}*</label>
                                            <input id="value" type="text" class="form-control" name="value" value="{{ old('value') }}" placeholder="{{ trans('general.value') }}" required autofocus>
                                            @if ($errors->has('value'))
                                            <span class="help-block">
                                                <strong>
                                                    {{ $errors->first('value') }}
                                                </strong>
                                            </span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="control-label">{{ trans('general.icon') }}</label>
                                            <select class="form-control" name="icon" required>
                                                @foreach($icons as $k => $v)
                                                <option value="{{ $v }}">{{ $v }}</option>
                                                @endforeach
                                            </select>
                                            <span class="help-block"> <a target="_blank" href="https://fontawesome.com/cheatsheet" class="">Check Visual Icons </a></span>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group{{ $errors->has('order') ? ' has-error' : '' }}">
                                            <label for="order" class="control-label">{{ trans('general.order') }}*</label>
                                            <input id="order" type="number" class="form-control" name="order" value="{{ old('order') }}" placeholder="{{ trans('general.order') }}" required autofocus>
                                            @if ($errors->has('order'))
                                            <span class="help-block">
                                                <strong>
                                                    {{ $errors->first('order') }}
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
                                <i class="fa fa-gift"></i> {{ trans('general.answer_main_details') }}
                            </div>
                        </div>
                        <div class="portlet-body form">
                            <div class="form-body">
                                <div class="row">
                                    <hr>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label class="control-label sbold">{{ trans('general.active') }}</label></br>
                                            <label class="radio-inline">
                                                <input type="radio" name="active" id="optionsRadios3" value="1"> {{ trans('general.active') }}</label>
                                            <label class="radio-inline">
                                                <input type="radio" name="active" id="optionsRadios4" checked value="0"> {{ trans('general.not_active') }}</label>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label class="control-label sbold">{{ trans('general.is_multi') }}</label></br>
                                            <label class="radio-inline">
                                                <input type="radio" name="is_multi" id="optionsRadios3" value="1"> {{ trans('general.is_multi') }}</label>
                                            <label class="radio-inline">
                                                <input type="radio" name="is_multi" id="optionsRadios4" checked value="0">{{ trans('general.not_is_multi') }}</label>
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