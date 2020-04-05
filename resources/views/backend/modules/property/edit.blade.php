@extends('backend.layouts.app')

@section('breadcrumbs')
    {{ Breadcrumbs::render('backend.admin.property.edit', $element) }}
@endsection

@section('content')
    <div class="portlet box blue">
        @include('backend.partials.forms.form_title',['title' => trans('general.edit_category_property')])
        <div class="portlet-body">
            @include('backend.partials._admin_instructions',['title' => trans('general.category_property') ,'message' =>
            trans('message.edit_category_property')])
            <div class="portlet-body form">
                <form class="horizontal-form" role="form" method="POST"
                      action="{{ route('backend.admin.property.update',$element->id) }}"
                      enctype="multipart/form-data">
                    @csrf
                    @method('put')
                    <div class="form-body">
                        <h3 class="form-section">{{ trans('general.edit_category_property') }}</h3>
                        <div class="portlet box blue ">
                            <div class="portlet-title">
                                <div class="caption">
                                    <i class="fa fa-gift"></i> {{ trans('general.main_details') }}
                                </div>
                            </div>
                            <div class="portlet-body form">
                                <div class="form-body">
                                    <div class="row">
                                        <div class="col-md-4">
                                            <div class="form-property {{ $errors->has('name_ar') ? ' has-error' : '' }}">
                                                <label for="name_ar"
                                                       class="control-label">{{ trans('general.name_ar') }}
                                                    *</label>
                                                <input id="name_ar" type="text" class="form-control tooltips"
                                                       data-container="body" data-placement="top"
                                                       data-original-title="{{ trans('message.name_ar') }}"
                                                       name="name_ar" value="{{ $element->name_ar }}"
                                                       placeholder="{{ trans('general.name_ar') }}" required autofocus>
                                                @if ($errors->has('name_ar'))
                                                    <span class="help-block">
                                                <strong>
                                                    {{ $errors->first('name_ar') }}
                                                </strong>
                                            </span>
                                                @endif
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-property {{ $errors->has('name_en') ? ' has-error' : '' }}">
                                                <label for="name_en"
                                                       class="control-label">{{ trans('general.name_en') }}
                                                    *</label>
                                                <input id="name_en" type="text" class="form-control tooltips"
                                                       data-container="body" data-placement="top"
                                                       data-original-title="{{ trans('message.name_en') }}"
                                                       name="name_en" value="{{ $element->name_en }}"
                                                       placeholder="{{ trans('general.name_en') }}" required autofocus>
                                                @if ($errors->has('name_en'))
                                                    <span class="help-block">
                                                <strong>
                                                    {{ $errors->first('name_en') }}
                                                </strong>
                                            </span>
                                                @endif
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-property {{ $errors->has('value') ? ' has-error' : '' }}">
                                                <label for="value"
                                                       class="control-label">{{ trans('general.value') }}
                                                    *</label>
                                                <input id="value" type="text" class="form-control tooltips"
                                                       data-container="body" data-placement="top"
                                                       data-original-title="{{ trans('message.value') }}"
                                                       name="value" value="{{ $element->value }}"
                                                       placeholder="{{ trans('general.value') }}" required autofocus>
                                                @if ($errors->has('value'))
                                                    <span class="help-block">
                                                <strong>
                                                    {{ $errors->first('value') }}
                                                </strong>
                                            </span>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                    <br>
                                    <div class="row">
                                        <div class="col-md-3">
                                            <div class="form-property {{ $errors->has('description_ar') ? ' has-error' : '' }}">
                                                <label for="description_ar"
                                                       class="control-label">{{ trans('general.description_ar') }}
                                                    *</label>
                                                <input id="description_ar" type="text" class="form-control tooltips"
                                                       data-container="body" data-placement="top"
                                                       data-original-title="{{ trans('message.description_ar') }}"
                                                       name="description_ar" value="{{ $element->description_ar }}"
                                                       placeholder="{{ trans('general.description_ar') }}" autofocus>
                                                @if ($errors->has('description_ar'))
                                                    <span class="help-block">
                                                <strong>
                                                    {{ $errors->first('description_ar') }}
                                                </strong>
                                            </span>
                                                @endif
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-property {{ $errors->has('description_en') ? ' has-error' : '' }}">
                                                <label for="description_en"
                                                       class="control-label">{{ trans('general.description_en') }}
                                                    *</label>
                                                <input id="description_en" type="text" class="form-control tooltips"
                                                       data-container="body" data-placement="top"
                                                       data-original-title="{{ trans('message.description_en') }}"
                                                       name="description_en" value="{{ $element->description_en }}"
                                                       placeholder="{{ trans('general.description_en') }}" autofocus>
                                                @if ($errors->has('description_en'))
                                                    <span class="help-block">
                                                <strong>
                                                    {{ $errors->first('description_en') }}
                                                </strong>
                                            </span>
                                                @endif
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label for="file"
                                                       class="control-label">{{ trans('general.main_image') }}</label>

                                                <input class="form-control tooltips" data-container="body"
                                                       data-placement="top"
                                                       data-original-title="{{ trans('message.main_image') }}"
                                                       name="image" placeholder="images" type="file"
                                                />
                                                <div class="help-block text-left">
                                                    {{ trans('message.best_fit',['width' => '150 px', 'height' => '150 px']) }}
                                                </div>
                                            </div>
                                        </div>
                                        @if($element->image)
                                            <div class="col-md-3">
                                                <img class="img-responsive img-sm"
                                                     src="{{ $element->imageThumbLink }}"
                                                     alt="">
                                                <a href="{{ route("backend.admin.image.clear",['model' => 'property', 'id' => $element->id ]) }}"><i
                                                            class="fa fa-fw fa-times"></i></a>
                                            </div>
                                        @endif
                                        <div class="col-md-3">
                                            <div class="form-property">
                                                <label for="single"
                                                       class="control-label">{{ trans('general.icon') }}</label>
                                                <select name="icon" class="form-control tooltips"
                                                        data-container="body" data-placement="top"
                                                        data-original-title="{{ trans('message.icon') }}">
                                                    <option value="">{{ trans('general.choose_icon') }}</option>
                                                    @foreach(json_decode(file_get_contents(base_path('icons.json')))->icons as $icon)
                                                        <option value="{{ $icon }}" {{ $icon == $element->icon ? 'selected' : null }}>{{ $icon }}</option>
                                                    @endforeach
                                                </select>
                                                <div class="help-block text-left">
                                                    <a href="https://fontawesome.com/icons?d=gallery" target="_blank">To
                                                        View Fontawesome Icons</a>
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
                                            <div class="col-md-2">
                                                <div class="form-property{{ $errors->has('order') ? ' has-error' : '' }}">
                                                    <label for="order"
                                                           class="control-label">{{ trans('general.sequence') }}
                                                        *</label>
                                                    <input id="order" type="number" class="form-control" name="order"
                                                           value="{{ $element->order }}"
                                                           placeholder="{{ trans('general.sequence') }}" maxlength="2"
                                                           autofocus>
                                                    @if ($errors->has('order'))
                                                        <span class="help-block">
                                                <strong>
                                                    {{ $errors->first('order') }}
                                                </strong>
                                            </span>
                                                    @endif
                                                </div>
                                            </div>
                                            <div class="col-md-2">
                                                <div class="form-property">
                                                    <label class="control-label sbold tooltips"
                                                           data-container="body" data-placement="top"
                                                           data-original-title="{{ trans('message.active') }}">{{ trans('general.active') }}</label></br>
                                                    <label class="radio-inline">
                                                        <input type="radio" name="active" id="optionsRadios3"
                                                                value="1" {{ $element->active ? 'checked' : null }}>
                                                        {{ trans('general.yes') }}</label>
                                                    <label class="radio-inline">
                                                        <input type="radio" name="active" id="optionsRadios4"
                                                               value="0" {{ !$element->active ? 'checked' : null  }}>
                                                        {{ trans('general.no') }}
                                                    </label>
                                                </div>
                                            </div>
{{--                                            <div class="col-md-2">--}}
{{--                                                <div class="form-property">--}}
{{--                                                    <label class="control-label sbold tooltips"--}}
{{--                                                           data-container="body" data-placement="top"--}}
{{--                                                           data-original-title="{{ trans('message.is_checkbox') }}">{{ trans('general.is_checkbox') }}</label></br>--}}
{{--                                                    <label class="radio-inline">--}}
{{--                                                        <input type="radio" name="is_checkbox"--}}
{{--                                                               id="optionsRadios3" value="1" {{ $element->is_checkbox ? 'checked' : null }}>--}}
{{--                                                        {{ trans('general.yes') }}</label>--}}
{{--                                                    <label class="radio-inline">--}}
{{--                                                        <input type="radio" name="is_checkbox"--}}
{{--                                                               id="optionsRadios4" value="0" {{ !$element->is_check_box ? 'checked' : null }}>--}}
{{--                                                        {{ trans('general.no') }}</label>--}}
{{--                                                </div>--}}
{{--                                            </div>--}}
{{--                                            <div class="col-md-2">--}}
{{--                                                <div class="form-property">--}}
{{--                                                    <label class="control-label sbold tooltips"--}}
{{--                                                           data-container="body" data-placement="top"--}}
{{--                                                           data-original-title="{{ trans('message.is_text') }}">{{ trans('general.is_text') }}</label></br>--}}
{{--                                                    <label class="radio-inline">--}}
{{--                                                        <input type="radio" name="is_text"--}}
{{--                                                               id="optionsRadios3" value="1" {{ $element->is_text ? 'checked' : null }}>--}}
{{--                                                        {{ trans('general.yes') }}</label>--}}
{{--                                                    <label class="radio-inline">--}}
{{--                                                        <input type="radio" name="is_text"--}}
{{--                                                               id="optionsRadios4"  value="0" {{ !$element->is_text ? 'checked' : null }}>--}}
{{--                                                        {{ trans('general.no') }}</label>--}}
{{--                                                </div>--}}
{{--                                            </div>--}}
                                            <div class="col-md-2">
                                                <div class="form-property">
                                                    <label class="control-label sbold tooltips"
                                                           data-container="body" data-placement="top"
                                                           data-original-title="{{ trans('message.on_home') }}">{{ trans('general.on_home') }}</label></br>
                                                    <label class="radio-inline">
                                                        <input type="radio" name="on_home"
                                                               id="optionsRadios3" value="1" {{ $element->on_home ? 'checked' : null }}>
                                                        {{ trans('general.yes') }}</label>
                                                    <label class="radio-inline">
                                                        <input type="radio" name="on_home"
                                                               id="optionsRadios4" value="0" {{ !$element->on_home ? 'checked' : null }}>
                                                        {{ trans('general.no') }}</label>
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
    </div>
@endsection