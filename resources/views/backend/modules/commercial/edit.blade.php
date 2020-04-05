@extends('backend.layouts.app')

@section('breadcrumbs')
    {{ Breadcrumbs::render('backend.admin.commercial.edit', $element) }}
@endsection
@section('content')
    <div class="portlet box blue">
        @include('backend.partials.forms.form_title',['title' => trans('general.edit_commercial')])
        <div class="portlet-body">
            @include('backend.partials._admin_instructions',['title' => trans('general.commercials') ,'message' => trans('message.edit_commercial')])
            <div class="portlet-body form">
                <form class="horizontal-form" role="form" method="POST"
                      action="{{ route('backend.admin.commercial.update', $element->id) }}" enctype="multipart/form-data">
                    @csrf
                    @method('put')
                    <div class="form-body">
                        <h3 class="form-section">{{ trans('general.edit_commercial') }}</h3>
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
                                            <div class="form-group {{ $errors->has('name_ar') ? ' has-error' : '' }}">
                                                <label for="name_ar"
                                                       class="control-label">{{ trans('general.name_ar') }}*</label>
                                                <input id="name_ar" type="text" class="form-control tooltips"
                                                       data-container="body" data-placement="top"
                                                       data-original-title="{{ trans('message.name_ar') }}"
                                                       name="name_ar" value="{{ $element->name_ar }}"
                                                       placeholder="{{ trans('general.name_ar') }}"  autofocus>
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
                                            <div class="form-group{{ $errors->has('name_en') ? ' has-error' : '' }}">
                                                <label for="name_en"
                                                       class="control-label">{{ trans('general.name_en') }}*</label>
                                                <input id="name_en" type="text" class="form-control tooltips"
                                                       data-container="body" data-placement="top"
                                                       data-original-title="{{ trans('message.name_en') }}"
                                                       name="name_en" value="{{ $element->name_en }}"
                                                       placeholder="{{ trans('general.name_en') }}" autofocus>
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
                                            <div class="form-group {{ $errors->has('caption_ar') ? ' has-error' : '' }}">
                                                <label for="caption_ar"
                                                       class="control-label">{{ trans('general.caption_ar') }}*</label>
                                                <input id="caption_ar" type="text" class="form-control tooltips"
                                                       data-container="body" data-placement="top"
                                                       data-original-title="{{ trans('message.caption_ar') }}"
                                                       name="caption_ar" value="{{ $element->caption_ar }}"
                                                       placeholder="{{ trans('general.caption_ar') }}"
                                                       autofocus>
                                                @if ($errors->has('caption_ar'))
                                                    <span class="help-block">
                                                <strong>
                                                    {{ $errors->first('caption_ar') }}
                                                </strong>
                                            </span>
                                                @endif
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group{{ $errors->has('caption_en') ? ' has-error' : '' }}">
                                                <label for="caption_en"
                                                       class="control-label">{{ trans('general.caption_en') }}*</label>
                                                <input id="caption_en" type="text" class="form-control tooltips"
                                                       data-container="body" data-placement="top"
                                                       data-original-title="{{ trans('message.caption_en') }}"
                                                       name="caption_en" value="{{ $element->caption_en }}"
                                                       placeholder="{{ trans('general.caption_en') }}"
                                                       autofocus>
                                                @if ($errors->has('caption_en'))
                                                    <span class="help-block">
                                                <strong>
                                                    {{ $errors->first('caption_en') }}
                                                </strong>
                                            </span>
                                                @endif
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group{{ $errors->has('order') ? ' has-error' : '' }}">
                                                <label for="order" class="control-label">{{ trans('general.sequence') }}
                                                    *</label>
                                                <input id="order" type="number" class="form-control tooltips"
                                                       data-container="body" data-placement="top"
                                                       data-original-title="{{ trans('message.sequence') }}"
                                                       name="order"
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
                                        <div class="col-md-4">
                                            <div class="form-group form-md-line-input">
                                                <input type="file" class="form-control tooltips" data-container="body"
                                                       data-placement="top"
                                                       data-original-title="{{ trans('message.main_image') }}"
                                                       name="image" placeholder="{{ trans('general.main_image') }}"
                                                       >
                                                <label for="form_control_1">{{ trans('general.main_image') }}</label>
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
                                            <div class="form-group">
                                                <label for="form_control_1">{{ trans('general.url') }}</label>
                                                <input type="text" class="form-control tooltips" data-container="body"
                                                       data-placement="top"
                                                       data-original-title="{{ trans('message.url') }}" name="url"
                                                       type="url"
                                                       placeholder="{{ trans('general.url') }}">
                                                <div class="help-block text-left">

                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="form_control_1">{{ trans('general.image_path') }}</label>
                                                <input type="file" class="form-control tooltips" data-container="body"
                                                       data-placement="top"
                                                       data-original-title="{{ trans('message.path') }}"
                                                       name="path" placeholder="{{ trans('general.path') }}"
                                                >
                                                name="path" placeholder="{{ trans('general.image_path') }}">
                                                <div class="help-block text-left">

                                                </div>
                                            </div>
                                        </div>
                                        @if(!$categories->isEmpty())
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label class="control-label">{{ trans('general.categories') }}
                                                        *</label>
                                                    <select multiple="multiple" class="multi-select"
                                                            id="my_multi_select1" name="categories[]">
                                                        @foreach($categories as $category)
                                                            <option value="{{ $category->id }}"
                                                                    {{ in_array($category->id,$element->categories->pluck('id')->unique()->flatten()->toArray()) ? 'selected' : null }}
                                                                    style="background-color: {{ $category->isParent ? 'lightblue' : null  }}">
                                                                {{ $category->name }}</option>
                                                            @if(!$category->children->isEmpty())
                                                                @foreach($category->children as $child)
                                                                    <option value="{{ $child->id }}"
                                                                            {{ in_array($child->id,$element->categories->pluck('id')->unique()->flatten()->toArray()) ? 'selected' : null }}
                                                                            style="padding-left: 15px">
                                                                        {{ $child->name }}</option>
                                                                    @if(!$child->children->isEmpty())
                                                                        @foreach($child->children as $subChild)
                                                                            <option value="{{ $subChild->id }}"
                                                                                    {{ in_array($subChild->id,$element->categories->pluck('id')->unique()->flatten()->toArray()) ? 'selected' : null }}
                                                                                    style="padding-left: 35px">
                                                                                {{ $subChild->name }}</option>
                                                                        @endforeach
                                                                    @endif
                                                                @endforeach
                                                            @endif
                                                        @endforeach
                                                    </select>
                                                    {{-- <span class="help-block">
                                                                                                                                        <strong>{{ trans('message.categories_instructions') }}</strong>
                                                    </span> --}}
                                                </div>
                                            </div>
                                        @endif
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
                                        @can('isAdminOrAbove')
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label class="control-label sbold tooltips" data-container="body"
                                                           data-placement="top"
                                                           data-original-title="{{ trans('message.active') }}">{{ trans('general.active') }}</label></br>
                                                    <label class="radio-inline">
                                                        <input type="radio" name="active" id="optionsRadios3" {{ $element->active ? 'checked' : null }}
                                                               value="1">
                                                        {{ trans('general.yes') }}</label>
                                                    <label class="radio-inline">
                                                        <input type="radio" name="active" id="optionsRadios4" value="0" {{ !$element->active ? 'checked' : null }}>
                                                        {{ trans('general.no') }}
                                                    </label>
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label class="control-label sbold tooltips" data-container="body"
                                                           data-placement="top"
                                                           data-original-title="{{ trans('message.on_home') }}">{{ trans('general.on_home') }}</label></br>
                                                    <label class="radio-inline">
                                                        <input type="radio" name="on_home" id="optionsRadios3" {{ $element->on_home ? 'checked' : null }}
                                                               value="1">
                                                        {{ trans('general.yes') }}</label>
                                                    <label class="radio-inline">
                                                        <input type="radio" name="on_home" id="optionsRadios4" {{ !$element->on_home ? 'checked' : null }}
                                                               value="0">
                                                        {{ trans('general.no') }}
                                                    </label>
                                                </div>
                                            </div>
                                        @else
                                            <input type="hidden" value="1" name="active">
                                        @endcan

                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label class="control-label sbold tooltips" data-container="body"
                                                       data-placement="top"
                                                       data-original-title="{{ trans('message.is_double') }}">{{ trans('general.is_double') }}</label></br>
                                                <label class="radio-inline">
                                                    <input type="radio" name="is_double" id="optionsRadios3" value="1" {{ $element->is_double ? 'checked' : null }}>
                                                    {{ trans('general.yes') }}</label>
                                                <label class="radio-inline">
                                                    <input type="radio" name="is_double" id="optionsRadios4" {{ !$element->is_double ? 'checked' : null }}
                                                           value="0">
                                                    {{ trans('general.no') }}
                                                </label>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label class="control-label sbold tooltips" data-container="body"
                                                       data-placement="top"
                                                       data-original-title="{{ trans('message.is_triple') }}">{{ trans('general.is_triple') }}</label></br>
                                                <label class="radio-inline">
                                                    <input type="radio" name="is_triple" id="optionsRadios3" value="1" {{ $element->is_triple ? 'checked' : null }}>
                                                    {{ trans('general.yes') }}</label>
                                                <label class="radio-inline">
                                                    <input type="radio" name="is_triple" id="optionsRadios4" {{ !$element->is_triple ? 'checked' : null }}
                                                           value="0">
                                                    {{ trans('general.no') }}
                                                </label>
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