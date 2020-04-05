@extends('backend.layouts.app')

@section('breadcrumbs')
    {{ Breadcrumbs::render('backend.admin.addon.create') }}
@endsection

@section('content')
    <div class="portlet box blue">
        @include('backend.partials.forms.form_title',['title' => trans('general.new_addon')])
        <div class="portlet-body">
            @include('backend.partials._admin_instructions',['title' => trans('general.addons') ,'message' =>
            trans('message.new_addon')])
            <div class="portlet-body form">
                <form class="horizontal-form" role="form" method="POST" action="{{ route('backend.admin.addon.store') }}"
                      enctype="multipart/form-data">
                    @csrf
                    <div class="form-body">
                        <h3 class="form-section">{{ trans('general.new_addon') }}</h3>
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
                                                       class="control-label">{{ trans('general.name_ar') }}
                                                    *</label>
                                                <input id="name_ar" type="text" class="form-control tooltips"
                                                       data-container="body" data-placement="top"
                                                       data-original-title="{{ trans('message.name_ar') }}"
                                                       name="name_ar" value="{{ old('name_ar') }}"
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
                                            <div class="form-group {{ $errors->has('name_en') ? ' has-error' : '' }}">
                                                <label for="name_en"
                                                       class="control-label">{{ trans('general.name_en') }}
                                                    *</label>
                                                <input id="name_en" type="text" class="form-control tooltips"
                                                       data-container="body" data-placement="top"
                                                       data-original-title="{{ trans('message.name_en') }}"
                                                       name="name_en" value="{{ old('name_en') }}"
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
                                            <div class="form-group {{ $errors->has('order') ? ' has-error' : '' }}">
                                                <label for="order"
                                                       class="control-label">{{ trans('general.sequence') }}
                                                    *</label>
                                                <input id="order" type="text" class="form-control tooltips"
                                                       data-container="body" data-placement="top"
                                                       data-original-title="{{ trans('message.order') }}"
                                                       name="order" value="{{ old('order') }}"
                                                       placeholder="{{ trans('general.order') }}" autofocus>
                                                @if ($errors->has('order'))
                                                    <span class="help-block">
                                                <strong>
                                                    {{ $errors->first('order') }}
                                                </strong>
                                            </span>
                                                @endif
                                            </div>
                                        </div>

                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label for="form_control_1">{{ trans('general.main_image') }}</label>
                                                <input type="file" class="form-control tooltips" data-container="body"
                                                       data-placement="top"
                                                       data-original-title="{{ trans('message.main_image') }}"
                                                       name="image" placeholder="{{ trans('general.main_image') }}"
                                                       required>
                                                <div class="help-block text-left">
                                                    {{ trans('message.best_fit',['width' => '1000 px', 'height' => '1000 px']) }}
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">

                                        @if(!$items->isEmpty())
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label class="control-label">{{ trans('general.items') }}</label>
                                                    <select multiple="multiple" class="multi-select"
                                                            id="my_multi_select2" name="items[]">
                                                        @foreach($items as $item)
                                                            <option value="{{ $item->id }}">{{ $item->name }}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                        @endif


                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="description"
                                                           class="control-label">{{ trans('general.description_arabic') }}</label>
                                                    <textarea type="text" class="form-control tooltips"
                                                              data-container="body" data-placement="top"
                                                              data-original-title="{{ trans('message.description_ar') }}"
                                                              id="description_ar" name="description_ar"
                                                              aria-multiline="true"
                                                              maxlength="500" {{ old('description_ar') }}></textarea>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="description"
                                                           class="control-label">{{ trans('general.description_english') }}</label>
                                                    <textarea type="text" class="form-control tooltips"
                                                              data-container="body" data-placement="top"
                                                              data-original-title="{{ trans('message.description_en') }}"
                                                              id="description_en" name="description_en"
                                                              aria-multiline="true"
                                                              maxlength="500">{{ old('description_en') }}</textarea>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="caption_ar"
                                                           class="control-label">{{ trans('general.caption_ar') }}</label>
                                                    <textarea type="text" class="form-control tooltips"
                                                              data-container="body" data-placement="top"
                                                              data-original-title="{{ trans('message.caption_ar') }}"
                                                              id="caption_ar" name="caption_ar" aria-multiline="true"
                                                              maxlength="500" {{ old('caption_ar') }}></textarea>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="caption_en"
                                                           class="control-label">{{ trans('general.caption_en') }}</label>
                                                    <textarea type="text" class="form-control tooltips"
                                                              data-container="body" data-placement="top"
                                                              data-original-title="{{ trans('message.caption_en') }}"
                                                              id="caption_en" name="caption_en" aria-multiline="true"
                                                              maxlength="500">{{ old('caption_en') }}</textarea>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="form-body">
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
                                                        <input type="radio" name="active" id="optionsRadios1" value="1"
                                                               checked>
                                                        {{ trans('general.yes') }} </label>
                                                    <label class="radio-inline">
                                                        <input type="radio" name="active" id="optionsRadios2"
                                                               value="0"> {{ trans('general.no') }}</label>
                                                </div>
                                            </div>
                                        @else
                                            <input type="hidden" name="active" value="1">
                                        @endif
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label class="control-label sbold tooltips" data-container="body"
                                                       data-placement="top"
                                                       data-original-title="{{ trans('message.is_multi') }}">{{ trans('general.is_multi') }}</label></br>
                                                <label class="radio-inline">
                                                    <input type="radio" name="is_multi" id="optionsRadios1" value="1">
                                                    {{ trans('general.yes') }} </label>
                                                <label class="radio-inline">
                                                    <input type="radio" name="is_multi" id="optionsRadios2" checked
                                                           value="0"> {{ trans('general.no') }}</label>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label class="control-label sbold tooltips" data-container="body"
                                                       data-placement="top"
                                                       data-original-title="{{ trans('message.exclusive') }}">{{ trans('general.exclusive') }}</label></br>
                                                <label class="radio-inline">
                                                    <input type="radio" name="exclusive" id="optionsRadios1" value="1">
                                                    {{ trans('general.yes') }} </label>
                                                <label class="radio-inline">
                                                    <input type="radio" name="exclusive" id="optionsRadios2" checked
                                                           value="0"> {{ trans('general.no') }}</label>
                                            </div>
                                        </div>

                                        <div class="col-lg-12">
                                            @include('backend.partials.forms._btn-group')
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection

