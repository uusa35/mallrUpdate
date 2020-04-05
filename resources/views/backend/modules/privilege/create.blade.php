@extends('backend.layouts.app')
@section('breadcrumbs')
{{ Breadcrumbs::render('backend.admin.privilege.create') }}
@endsection

@section('content')
<div class="portlet box blue">
    @include('backend.partials.forms.form_title')
    <div class="portlet-body">
        @include('backend.partials._admin_instructions',['title' => trans('general.privileges') ,'message' => trans('message.admin_privilege_message')])
        <div class="portlet-body form">
            <form class="horizontal-form" role="form" method="POST" action="{{ route('backend.admin.privilege.store') }}" enctype="multipart/form-data">
                @csrf
                <div class="form-body">
                    <h3 class="form-section">{{ trans('general.new_privilege') }}</h3>
                    <div class="portlet box blue ">
                        <div class="portlet-title">
                            <div class="caption">
                                <i class="fa fa-gift"></i> {{ trans('general.privilege_main_details') }}
                            </div>
                        </div>
                        <div class="portlet-body form">
                            <div class="form-body">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group {{ $errors->has('name') ? ' has-error' : '' }}">
                                            <label for="name" class="control-label">{{ trans('general.name') }}*</label>
                                            <input id="name" type="text" class="form-control" name="name" value="{{ old('name') }}" placeholder="{{ trans('general.name') }}" required autofocus>
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
                                        <div class="form-group">
                                            <label class="control-label">{{ trans('general.roles') }}</label>
                                            <select multiple="multiple" class="multi-select"
                                                    id="my_multi_select2" name="roles[]">
                                                @foreach($roles as $role)
                                                    <option value="{{ $role->id }}">{{ $role->name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group {{ $errors->has('slug_ar') ? ' has-error' : '' }}">
                                            <label for="slug_ar" class="control-label">{{ trans('general.slug_ar') }}*</label>
                                            <input id="slug_ar" type="text" class="form-control" name="slug_ar" value="{{ old('slug_ar') }}" placeholder="{{ trans('general.slug_ar') }}" required autofocus>
                                            @if ($errors->has('slug_ar'))
                                            <span class="help-block">
                                                <strong>
                                                    {{ $errors->first('slug_ar') }}
                                                </strong>
                                            </span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group{{ $errors->has('slug_en') ? ' has-error' : '' }}">
                                            <label for="slug_en" class="control-label">{{ trans('general.slug_en') }}*</label>
                                            <input id="slug_en" type="text" class="form-control" name="slug_en" value="{{ old('slug_en') }}" placeholder="{{ trans('general.slug_en') }}" required autofocus>
                                            @if ($errors->has('slug_en'))
                                            <span class="help-block">
                                                <strong>
                                                    {{ $errors->first('slug_en') }}
                                                </strong>
                                            </span>
                                            @endif
                                        </div>
                                    </div>


                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="description" class="control-label">{{ trans('general.description_arabic') }}</label>
                                            <textarea type="text" class="form-control tooltips" data-container="body" data-placement="top" data-original-title="{{ trans('message.description_ar') }}" id="description_ar" name="description_ar" aria-multiline="true" maxlength="500" {{ old('description_ar') }}></textarea>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="description" class="control-label">{{ trans('general.description_english') }}</label>
                                            <textarea type="text" class="form-control tooltips" data-container="body" data-placement="top" data-original-title="{{ trans('message.description_en') }}" id="description_en" name="description_en" aria-multiline="true" maxlength="500">{{ old('description_en') }}</textarea>
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
                                            <label class="control-label sbold">{{ trans('general.index') }}</label></br>
                                            <label class="radio-inline">
                                                <input type="radio" name="index" id="optionsRadios3" value="1">
                                                {{ trans('general.index') }}</label>
                                            <label class="radio-inline">
                                                <input type="radio" name="index" id="optionsRadios4" checked value="0">
                                                {{ trans('general.not_index') }}</label>
                                        </div>
                                        <span class="help-block">
                                            <strong>{{ trans('message.index_instructions') }}</strong>
                                        </span>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="control-label sbold">{{ trans('general.view') }}</label></br>
                                            <label class="radio-inline">
                                                <input type="radio" name="view" id="optionsRadios3" value="1">
                                                {{ trans('general.view') }}</label>
                                            <label class="radio-inline">
                                                <input type="radio" name="view" id="optionsRadios4" checked value="0">
                                                {{ trans('general.not_view') }}</label>
                                        </div>
                                        <span class="help-block">
                                            <strong>{{ trans('message.view_instructions') }}</strong>
                                        </span>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="control-label sbold">{{ trans('general.create') }}</label></br>
                                            <label class="radio-inline">
                                                <input type="radio" name="create" id="optionsRadios3" value="1">
                                                {{ trans('general.create') }}</label>
                                            <label class="radio-inline">
                                                <input type="radio" name="create" id="optionsRadios4" checked value="0">
                                                {{ trans('general.not_create') }}
                                            </label>
                                        </div>
                                        <span class="help-block">
                                            <strong>{{ trans('message.create_instructions') }}</strong>
                                        </span>
                                    </div>


                                </div>

                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="control-label sbold">{{ trans('general.update') }}</label></br>
                                            <label class="radio-inline">
                                                <input type="radio" name="update" id="optionsRadios3" value="1">
                                                {{ trans('general.update') }}</label>
                                            <label class="radio-inline">
                                                <input type="radio" name="update" id="optionsRadios4" checked value="0">
                                                {{ trans('general.not_update') }}</label>
                                        </div>
                                        <span class="help-block">
                                            <strong>{{ trans('message.update_instructions') }}</strong>
                                        </span>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="control-label sbold">{{ trans('general.delete') }}</label></br>
                                            <label class="radio-inline">
                                                <input type="radio" name="delete" id="optionsRadios3" value="1">
                                                {{ trans('general.delete') }}</label>
                                            <label class="radio-inline">
                                                <input type="radio" name="delete" id="optionsRadios4" checked value="0">
                                                {{ trans('general.not_delete') }}</label>
                                        </div>
                                        <span class="help-block">
                                            <strong>{{ trans('message.delete_instructions') }}</strong>
                                        </span>
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
