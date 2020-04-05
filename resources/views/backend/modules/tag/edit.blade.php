@extends('backend.layouts.app')
@section('breadcrumbs')
    {{ Breadcrumbs::render('backend.admin.tag.edit', $element) }}
@endsection

@section('content')
    <div class="portlet box blue">
        @include('backend.partials.forms.form_title')
        <div class="portlet-body">
            @include('backend.partials._admin_instructions',['title' => trans('general.tags') ,'message' => trans('message.admin_tag_message')])
            <div class="portlet-body form">
                <form class="horizontal-form" role="form" method="POST" action="{{ route('backend.tag.update', $element->id) }}" enctype="multipart/form-data">
                    @csrf
                    <div class="form-body">
                        <h3 class="form-section">{{ trans('general.create_tag') }}</h3>
                        <div class="portlet box blue ">
                            <div class="portlet-title">
                                <div class="caption">
                                    <i class="fa fa-gift"></i> {{ trans('general.tag_main_details') }}
                                </div>
                            </div>
                            <div class="portlet-body form">
                                <div class="form-body">
                                    <div class="row">
                                        <div class="col-md-4">
                                            <div class="form-group {{ $errors->has('name') ? ' has-error' : '' }}">
                                                <label for="name" class="control-label">{{ trans('general.name') }}*</label>
                                                <input id="name" type="text" class="form-control" name="name" value="{{ $element->name }}" placeholder="{{ trans('general.name') }}" required autofocus>
                                                @if ($errors->has('name'))
                                                    <span class="help-block">
                                                <strong>
                                                    {{ $errors->first('name') }}
                                                </strong>
                                            </span>
                                                @endif
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group {{ $errors->has('slug_ar') ? ' has-error' : '' }}">
                                                <label for="slug_ar" class="control-label">{{ trans('general.slug_ar') }}*</label>
                                                <input id="slug_ar" type="text" class="form-control" name="slug_ar" value="{{ $element->slug_ar }}" placeholder="{{ trans('general.slug_ar') }}" required autofocus>
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
                                                <label for="slug_en" class="control-label">{{ trans('general.slug_en') }}*</label>
                                                <input id="slug_en" type="text" class="form-control" name="slug_en" value="{{ $element->slug_en }}" placeholder="{{ trans('general.slug_en') }}" required autofocus>
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
                                            <div class="form-group form-md-line-input">
                                                <input type="file" class="form-control tooltips" data-container="body"
                                                       data-placement="top"
                                                       data-original-title="{{ trans('message.main_image') }}"
                                                       name="image" placeholder="{{ trans('general.main_image') }}"
                                                       required>
                                                <label for="form_control_1">{{ trans('general.main_image') }} </label>
                                                <div class="help-block text-left">
                                                    {{ trans('message.best_fit',['width' => '930 px', 'height' => '365 px']) }}
                                                </div>
                                            </div>
                                        </div>
                                        @if($element->image)
                                            <div class="col-md-3">
                                                <img class="img-responsive img-sm"
                                                     src="{{ $element->imageThumbLink }}"
                                                     alt="">
                                                <a href="{{ route("backend.admin.image.clear",['model' => 'product', 'id' => $element->id ]) }}"><i
                                                            class="fa fa-fw fa-times"></i></a>
                                            </div>
                                        @endif
                                        <div class="col-md-4">
                                            <div class="form-group{{ $errors->has('order') ? ' has-error' : '' }}">
                                                <label for="order" class="control-label">{{ trans('general.order') }} *</label>
                                                <input id="order" type="number" class="form-control" name="order" value="{{ $element->order }}" placeholder="{{ trans('general.order') }}" maxlength="2" autofocus>
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
                                    <i class="fa fa-gift"></i> {{ trans('general.tag_attributes_details') }}
                                </div>
                            </div>
                            <div class="portlet-body form">
                                <div class="form-body">
                                    <div class="row">
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label class="control-label sbold">{{ trans('general.active') }}</label></br>
                                                <label class="radio-inline">
                                                    <input type="radio" name="active" id="optionsRadios1" value="1" {{ $element->active ? 'checked' : null }}> {{ trans('general.active') }} </label>
                                                <label class="radio-inline">
                                                    <input type="radio" name="active" id="optionsRadios2" {{ !$element->active ? 'checked' : null  }} value="0"> {{ trans('general.not_active') }}</label>
                                            </div>
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