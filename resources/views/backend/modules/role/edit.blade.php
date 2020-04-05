@extends('backend.layouts.app')
@section('breadcrumbs')
    {{--{{ Breadcrumbs::render('backend.admin.role.edit') }}--}}
@endsection

@section('content')
    <div class="portlet box blue">
        @include('backend.partials.forms.form_title')
        <div class="portlet-body form">
            <form class="horizontal-form" role="form" method="POST"
                  action="{{ route('backend.admin.role.update', $element->id)  }}" enctype="multipart/form-data">
                @csrf
                <input type="hidden" name="_method" value="patch">
                <div class="form-body">
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
                                            <input type="text" id="name" class="form-control"
                                                   value="{{ $element->name }}" required>
                                            <span class="help-block"> Role Name must be unique </span>
                                        </div>
                                    </div>
                                    <!--/span-->
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label class="control-label">{{ trans('general.slug_ar') }}</label>
                                            <input type="text" id="slug_ar" name="slug_ar" class="form-control"
                                                   value="{{ $element->slug_ar }}" required>
                                            {{--<span class="help-block"> This field has error. </span>--}}
                                        </div>
                                    </div>


                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label class="control-label">{{ trans('general.slug_en') }}</label>
                                            <input type="text" id="slug_en" name="slug_en" class="form-control"
                                                   value="{{ $element->slug_en }}"
                                                   placeholder="{{ trans('general.slug_en') }}" required>
                                            {{--<span class="help-block"> This field has error. </span>--}}
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label class="control-label">{{ trans('general.caption_ar') }}</label>
                                            <input type="text" id="caption_ar" name="caption_ar" class="form-control"
                                                   value="{{ $element->caption_ar }}"
                                                   placeholder="{{ trans('general.caption_ar') }}" required>
                                            {{--<span class="help-block"> This field has error. </span>--}}
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label class="control-label">{{ trans('general.caption_en') }}</label>
                                            <input type="text" id="caption_en" name="caption_en" class="form-control"
                                                   value="{{ $element->caption_en }}"
                                                   placeholder="{{ trans('general.caption_en') }}" required>
                                            {{--<span class="help-block"> This field has error. </span>--}}
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group{{ $errors->has('order') ? ' has-error' : '' }}">
                                            <label for="order" class="control-label">{{ trans('general.order') }}
                                                *</label>
                                            <input id="order" type="number" class="form-control" name="order"
                                                   value="{{ $element->order }}"
                                                   placeholder="{{ trans('general.order') }}" maxlength="2" autofocus>
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
                                            <label for="color" class="control-label">{{ trans('general.color') }}
                                                *</label>
                                            <input type="text" id="hue-demo" class="form-control demo"
                                                   data-control="hue" name="color" value="{{ $element->color }}">
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
                                    <div class="col-lg-12">
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label class="control-label sbold">{{ trans('general.active') }}</label>
                                                <div class="radio-list">
                                                    <label class="radio-inline">
                                                        <input type="radio" name="active" id="optionsRadios1"
                                                               value="1" {{ $element->active ? 'checked' : null }}> {{ trans('general.active') }}
                                                    </label>
                                                    <label class="radio-inline">
                                                        <input type="radio" name="active" id="optionsRadios2"
                                                               value="0" {{ !$element->active  ? 'checked' : null }}>
                                                        {{ trans('general.not_active') }}</label>
                                                </div>
                                            </div>
                                        </div>
                                        <!--/span-->
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label class="control-label sbold">{{ trans('general.is_admin') }}</label>
                                                <div class="radio-list">
                                                    <label class="radio-inline">
                                                        <input type="radio" name="is_admin" id="optionsRadios3"
                                                               value="1" {{ $element->is_admin ? 'checked' : null }}>
                                                        {{ trans('general.is_admin') }}</label>
                                                    <label class="radio-inline">
                                                        <input type="radio" name="is_admin" id="optionsRadios4"
                                                               value="0" {{ !$element->is_admin  ? 'checked' : null }}> {{ trans('general.not_is_admin') }}
                                                    </label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label class="control-label sbold">{{ trans('general.is_super') }}</label>
                                                <div class="radio-list">
                                                    <label class="radio-inline">
                                                        <input type="radio" name="is_super" id="optionsRadios3"
                                                               value="1" {{ $element->is_super ? 'checked' : null }}>
                                                        {{ trans('general.is_super') }}</label>
                                                    <label class="radio-inline">
                                                        <input type="radio" name="is_super" id="optionsRadios4"
                                                               value="0" {{ !$element->is_super  ? 'checked' : null }}> {{ trans('general.not_is_super') }}
                                                    </label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label class="control-label sbold">{{ trans('general.is_client') }}</label>
                                                <div class="radio-list">
                                                    <label class="radio-inline">
                                                        <input type="radio" name="is_client" id="optionsRadios3"
                                                               value="1" {{ $element->is_client ? 'checked' : null }}>
                                                        {{ trans('general.is_client') }}</label>
                                                    <label class="radio-inline">
                                                        <input type="radio" name="is_client" id="optionsRadios4"
                                                               value="0" {{ !$element->is_client  ? 'checked' : null }}> {{ trans('general.not_is_client') }}
                                                    </label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label class="control-label sbold">{{ trans('general.is_designer') }}</label>
                                                <div class="radio-list">
                                                    <label class="radio-inline">
                                                        <input type="radio" name="is_designer" id="optionsRadios3"
                                                               value="1" {{ $element->is_designer ? 'checked' : null }}>
                                                        {{ trans('general.is_designer') }}</label>
                                                    <label class="radio-inline">
                                                        <input type="radio" name="is_designer" id="optionsRadios4"
                                                               value="0" {{ !$element->is_designer  ?'checked' : null }}> {{ trans('general.not_is_designer') }}
                                                    </label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label class="control-label sbold">{{ trans('general.is_visible') }}</label>
                                                    <div class="radio-list">
                                                        <label class="radio-inline">
                                                            <input type="radio" name="is_visible" id="optionsRadios5"
                                                                   value="1" {{ $element->is_visible ? 'checked' : null }}> {{ trans('general.is_visible') }}
                                                        </label>
                                                        <label class="radio-inline">
                                                            <input type="radio" name="is_visible" id="optionsRadios6"
                                                                   value="0" {{ !$element->is_visible  ? 'checked' : null }}> {{ trans('general.not_is_visible') }}
                                                        </label>
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
                                                        <input type="radio" name="is_company" id="optionsRadios7"
                                                               value="1" {{ $element->is_company ? 'checked' : null }}>
                                                        {{ trans('general.is_company') }}</label>
                                                    <label class="radio-inline">
                                                        <input type="radio" name="is_company" id="optionsRadios8"
                                                               value="0" {{ !$element->is_company  ? 'checked' : null }}> {{ trans('general.not_is_company') }}
                                                    </label>
                                                </div>
                                                <span class="help-block"> Role that has companies attributes (ex. branches) </span>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label class="control-label sbold">{{ trans('general.is_celebrity') }}</label>
                                                <div class="radio-list">
                                                    <label class="radio-inline">
                                                        <input type="radio" name="is_celebrity" id="optionsRadios7"
                                                               value="1" {{ $element->is_celebrity ? 'checked' : null }}>
                                                        {{ trans('general.is_celebrity') }}</label>
                                                    <label class="radio-inline">
                                                        <input type="radio" name="is_celebrity" id="optionsRadios8"
                                                               value="0" {{ !$element->is_celebrity  ? 'checked' : null }}> {{ trans('general.not_is_celebrity') }}
                                                    </label>
                                                </div>
                                                <span class="help-block"> Role that has companies attributes (ex. branches) </span>
                                            </div>
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
                                    <div class="col-lg-12">
                                        @if(!$privileges->isEmpty())
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label class="control-label">{{ trans('general.privileges') }}</label>
                                                    <select multiple="multiple" class="multi-select"
                                                            id="my_multi_select2" name="privileges[]">
                                                        @foreach($privileges as $privilege)
                                                            <option value="{{ $privilege->id }}" {{ in_array($privilege->id,$element->privileges()->get()->where('pivot.index',true)->pluck('pivot.privilege_id')->toArray()) ? 'selected' : null }}
                                                            >{{ $privilege->name }}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                        @endif
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