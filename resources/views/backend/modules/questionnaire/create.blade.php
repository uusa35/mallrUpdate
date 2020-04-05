@extends('backend.layouts.app')

@section('breadcrumbs')
{{ Breadcrumbs::render('backend.admin.questionnaire.create') }}
@endsection
@section('content')
<div class="portlet box blue">
    @include('backend.partials.forms.form_title')
    <div class="portlet-body">
        @include('backend.partials._admin_instructions',['title' => trans('general.questionnaires') ,'message' => trans('message.admin_questionnaire_message')])
        <div class="portlet-body form">
            <form class="horizontal-form" role="form" method="POST" action="{{ route('backend.admin.questionnaire.store') }}" enctype="multipart/form-data">
                @csrf
                <div class="form-body">
                    <h3 class="form-section">{{ trans('general.create_questionnaire') }}</h3>
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
                                        <div class="form-group {{ $errors->has('name') ? ' has-error' : '' }}">
                                            <label for="name" class="control-label">{{ trans('general.name') }}*</label>
                                            <input id="name" type="text" class="form-control tooltips" data-container="body" data-placement="top" data-original-title="{{ trans('message.name') }}" name="name" value="{{ old('name') }}" placeholder="{{ trans('general.name') }}" required autofocus>
                                            @if ($errors->has('name'))
                                            <span class="help-block">
                                                <strong>
                                                    {{ $errors->first('name') }}
                                                </strong>
                                            </span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group{{ $errors->has('mobile') ? ' has-error' : '' }}">
                                            <label for="mobile" class="control-label">{{ trans('general.mobile') }}*</label>
                                            <input id="mobile" type="number" class="form-control tooltips" data-container="body" data-placement="top" data-original-title="{{ trans('message.mobile') }}" name="mobile" value="{{ old('mobile') }}" placeholder="{{ trans('general.mobile') }}" required autofocus>
                                            @if ($errors->has('mobile'))
                                            <span class="help-block">
                                                <strong>
                                                    {{ $errors->first('mobile') }}
                                                </strong>
                                            </span>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group {{ $errors->has('email') ? ' has-error' : '' }}">
                                            <label for="email" class="control-label">{{ trans('general.email') }}*</label>
                                            <input id="email" type="text" class="form-control tooltips" data-container="body" data-placement="top" data-original-title="{{ trans('message.email') }}" name="email" value="{{ old('email') }}" placeholder="{{ trans('general.email') }}" required autofocus>
                                            @if ($errors->has('email'))
                                            <span class="help-block">
                                                <strong>
                                                    {{ $errors->first('email') }}
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
                @include('backend.partials.forms._btn-group')
            </form>
        </div>
    </div>
    @endsection