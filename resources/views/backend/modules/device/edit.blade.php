@extends('backend.layouts.app')

@section('breadcrumbs')
    {{ Breadcrumbs::render('backend.admin.device.edit', $element) }}
@endsection
@section('content')
    <div class="portlet box blue">
        @include('backend.partials.forms.form_title',['title' => trans('general.edit_device')])
        <div class="portlet-body">
            @include('backend.partials._admin_instructions',['title' => trans('general.devices') ,'message' => trans('message.edit_device')])
            <div class="portlet-body form">
                <form class="horizontal-form" role="form" method="POST"
                      action="{{ route('backend.admin.device.store') }}" enctype="multipart/form-data">
                    @csrf
                    @method('put')
                    <div class="form-body">
                        <h3 class="form-section">{{ trans('general.edit_device') }}</h3>
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
                                            <div class="form-group {{ $errors->has('player_id') ? ' has-error' : '' }}">
                                                <label for="player_id"
                                                       class="control-label"> {{ trans('general.player_id') }}*</label>
                                                <input id="player_id" type="text" class="form-control tooltips"
                                                       data-container="body" data-placement="top"
                                                       data-original-title="{{ trans('message.player_id') }}"
                                                       name="player_id" value="{{ $element->player_id }}"
                                                       placeholder="{{ trans('general.player_id') }}" required
                                                       autofocus>
                                                @if ($errors->has('player_id'))
                                                    <span class="help-block">
                                                <strong>
                                                    {{ $errors->first('player_id') }}
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
                                                <label class="control-label sbold tooltips" data-container="body"
                                                       data-placement="top"
                                                       data-original-title="{{ trans('message.active') }}">{{ trans('general.active') }}</label></br>
                                                <label class="radio-inline">
                                                    <input type="radio" name="active" id="optionsRadios3"
                                                           {{ $element->active ? 'checked' : null }}
                                                           value="1"> {{ trans('general.yes') }}</label>
                                                <label class="radio-inline">
                                                    <input type="radio" name="active" id="optionsRadios4"
                                                           {{ !$element->active ? 'checked' : null }}
                                                           value="0"> {{ trans('general.no') }}</label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @include('backend.partials.forms._btn-group')
            </div>
            </form>
        </div>
    </div>
@endsection