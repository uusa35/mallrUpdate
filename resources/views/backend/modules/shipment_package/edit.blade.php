@extends('backend.layouts.app')
@section('breadcrumbs')
    {{ Breadcrumbs::render('backend.package.edit', $element) }}
@endsection
@section('content')
    <div class="portlet box blue">
        @include('backend.partials.forms.form_title', ['title' => trans('general.edit_package')])
        <div class="portlet-body">
            @include('backend.partials._admin_instructions',['title' => trans('general.packages') ,'message' => trans('message.edit_package')])
            <div class="portlet-body form">
                <form class="horizontal-form" role="form" method="POST"
                      action="{{ route('backend.package.update', $element->id) }}"
                      enctype="multipart/form-data">
                    @csrf
                    @method('put')
                    <div class="form-body">
                        <h3 class="form-section">{{ trans('general.edit_package') }}</h3>
                        {{--name arabic / name english --}}
                        <div class="portlet box blue ">
                            <div class="portlet-title">
                                <div class="caption">
                                    <i class="fa fa-gift"></i> {{ trans('general.shipment_main_details') }}
                                </div>
                            </div>
                            <div class="portlet-body form">
                                <div class="form-body">
                                    <div class="row">
                                        <div class="col-md-4">
                                            <div class="form-group {{ $errors->has('name') ? ' has-error' : '' }}">
                                                <label for="name" class="control-label">{{ trans('general.name') }}
                                                    *</label>
                                                <input id="name" type="text" class="form-control" name="name"
                                                       value="{{ $element->name }}"
                                                       placeholder="{{ trans('general.name_ar') }}" required autofocus>
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
                                                <label for="form_control_1">{{ trans('general.shipment_table') }}</label>
                                                <input type="file" class="form-control tooltips"
                                                       data-container="body" data-placement="top"
                                                       data-original-title="{{ trans('message.shipment_table') }}"
                                                       name="image"
                                                       placeholder="{{ trans('general.image') }}">
                                                <div class="help-block text-left">
                                                    {{ trans('message.best_fit',['width' => '1080 px', 'height' => '1440']) }}
                                                </div>
                                            </div>
                                        </div>
                                        @if($element->image)
                                            <div class="col-md-3">
                                                <img class="img-responsive img-sm" src="{{ $element->imageThumbLink }}"
                                                     alt="">
                                                <a href="{{ route("backend.admin.image.clear",['model' => 'ShipmentPackage', 'id' => $element->id ]) }}"><i
                                                            class="fa fa-fw fa-times"></i></a>
                                            </div>
                                        @endif
                                        <div class="col-md-4">
                                            <div class="form-group {{ $errors->has('slug_ar') ? ' has-error' : '' }}">
                                                <label for="slug_ar"
                                                       class="control-label">{{ trans('general.slug_ar') }}*</label>
                                                <input id="slug_ar" type="text" class="form-control" name="slug_ar"
                                                       value="{{ $element->slug_ar }}"
                                                       placeholder="{{ trans('general.slug_ar') }}" required autofocus>
                                                @if ($errors->has('slug_ar'))
                                                    <span class="help-block">
                                                <strong>
                                                    {{ $errors->first('slug_ar') }}
                                                </strong>
                                            </span>
                                                @endif
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group{{ $errors->has('slug_en') ? ' has-error' : '' }}">
                                                <label for="slug_en"
                                                       class="control-label">{{ trans('general.slug_en') }}*</label>
                                                <input id="slug_en" type="text" class="form-control" name="slug_en"
                                                       value="{{ $element->slug_en }}"
                                                       placeholder="{{ trans('general.slug_en') }}" required autofocus>
                                                @if ($errors->has('slug_en'))
                                                    <span class="help-block">
                                                <strong>
                                                    {{ $errors->first('slug_en') }}
                                                </strong>
                                            </span>
                                                @endif
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group{{ $errors->has('charge') ? ' has-error' : '' }}">
                                                <label for="charge" class="control-label">{{ trans('general.charge') }}
                                                    *</label>
                                                <input id="charge" type="text" class="form-control" name="charge"
                                                       value="{{ $element->charge }}"
                                                       placeholder="{{ trans('general.charge') }}" required autofocus>
                                                @if ($errors->has('charge'))
                                                    <span class="help-block">
                                                <strong>
                                                    {{ $errors->first('charge') }}
                                                </strong>
                                            </span>
                                                @endif
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group{{ $errors->has('charge_one') ? ' has-error' : '' }}">
                                                <label for="charge" class="control-label">Charge for One KG or
                                                    Less*</label>
                                                <input id="charge_one"
                                                       type="text"
                                                       class="form-control"
                                                       name="charge_one"
                                                       value="{{ $element->charge_one }}"
                                                       placeholder="charge_one"
                                                       required autofocus>
                                                @if ($errors->has('charge_one'))
                                                    <span class="help-block">
                                        <strong>
                                            {{ $errors->first('charge_one') }}
                                        </strong>
                                    </span>
                                                @endif
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group{{ $errors->has('charge_two') ? ' has-error' : '' }}">
                                                <label for="charge" class="control-label">Charge for 1.5 KG or
                                                    Less*</label>
                                                <input id="charge_two"
                                                       type="text"
                                                       class="form-control"
                                                       name="charge_two"
                                                       value="{{ $element->charge_two }}"
                                                       placeholder="charge_two"
                                                       required autofocus>
                                                @if ($errors->has('charge_two'))
                                                    <span class="help-block">
                                        <strong>
                                            {{ $errors->first('charge_two') }}
                                        </strong>
                                    </span>
                                                @endif
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group{{ $errors->has('charge_three') ? ' has-error' : '' }}">
                                                <label for="charge_three" class="control-label">Charge for 2 KG or
                                                    Less*</label>
                                                <input id="charge_three"
                                                       type="text"
                                                       class="form-control"
                                                       name="charge_three"
                                                       value="{{ $element->charge_three }}"
                                                       placeholder="charge_three"
                                                       required autofocus>
                                                @if ($errors->has('charge_three'))
                                                    <span class="help-block">
                                        <strong>
                                            {{ $errors->first('charge_three') }}
                                        </strong>
                                    </span>
                                                @endif
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group{{ $errors->has('charge_four') ? ' has-error' : '' }}">
                                                <label for="charge_four" class="control-label">Charge for greater than 2
                                                    KG*</label>
                                                <input id="charge_four"
                                                       type="text"
                                                       class="form-control"
                                                       name="charge_four"
                                                       value="{{ $element->charge_four }}"
                                                       placeholder="charge_four"
                                                       required autofocus>
                                                @if ($errors->has('charge_four'))
                                                    <span class="help-block">
                                        <strong>
                                            {{ $errors->first('charge_four') }}
                                        </strong>
                                    </span>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group {{ $errors->has('notes_ar') ? ' has-error' : '' }}">
                                            <label for="notes_ar"
                                                   class="control-label">{{ trans('general.notes_ar') }}*</label>
                                            <input id="notes_ar" type="text" class="form-control" name="notes_ar"
                                                   value="{{ $element->notes_ar }}"
                                                   placeholder="{{ trans('general.notes_ar') }}" required autofocus>
                                            @if ($errors->has('notes_ar'))
                                                <span class="help-block">
                                                <strong>
                                                    {{ $errors->first('notes_ar') }}
                                                </strong>
                                            </span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group {{ $errors->has('notes_en') ? ' has-error' : '' }}">
                                            <label for="notes_en"
                                                   class="control-label">{{ trans('general.notes_en') }}*</label>
                                            <input id="notes_en" type="text" class="form-control" name="notes_en"
                                                   value="{{ $element->notes_en }}"
                                                   placeholder="{{ trans('general.notes_en') }}" required autofocus>
                                            @if ($errors->has('notes_en'))
                                                <span class="help-block">
                                                <strong>
                                                    {{ $errors->first('notes_en') }}
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
                                    <hr>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label class="control-label sbold">{{ trans('general.active') }}</label></br>
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
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label class="control-label sbold">{{ trans('general.is_available') }}</label></br>
                                            <label class="radio-inline">
                                                <input type="radio" name="is_available" id="optionsRadios3"
                                                       {{ $element->is_availble ? 'checked' : null }}
                                                       value="1"> {{ trans('general.yes') }}</label>
                                            <label class="radio-inline">
                                                <input type="radio" name="is_available" id="optionsRadios4"
                                                       {{ !$element->is_availble ? 'checked' : null }}
                                                       value="0"> {{ trans('general.no') }}</label>
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