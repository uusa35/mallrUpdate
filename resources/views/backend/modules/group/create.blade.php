@extends('backend.layouts.app')

@section('breadcrumbs')
    {{ Breadcrumbs::render('backend.admin.group.create') }}
@endsection

@section('content')
    <div class="portlet box blue">
        @include('backend.partials.forms.form_title',['title' => trans('general.new_category_group')])
        <div class="portlet-body">
            @include('backend.partials._admin_instructions',['title' => trans('general.category_group') ,'message' =>
            trans('message.new_category_group')])
            <div class="portlet-body form">
                <form class="horizontal-form" role="form" method="POST"
                      action="{{ route('backend.admin.group.store') }}"
                      enctype="multipart/form-data">
                    @csrf
                    <div class="form-body">
                        <h3 class="form-section">{{ trans('general.new_category_group') }}</h3>
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
                                                    {{ trans('message.best_fit',['width' => '150 px', 'height' => '150px']) }}
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-property">
                                                <label for="single"
                                                       class="control-label">{{ trans('general.icon') }}
                                                    *</label>
                                                <select name="icon" class="form-control tooltips"
                                                        data-container="body" data-placement="top"
                                                        data-original-title="{{ trans('message.icon') }}">
                                                    <option value="">{{ trans('general.choose_icon') }}</option>
                                                    @foreach(json_decode(file_get_contents(base_path('icons.json')))->icons as $icon)
                                                        <option value="{{ $icon }}">{{ $icon }}</option>
                                                    @endforeach
                                                </select>
                                                <div class="help-block text-left">
                                                    <a href="https://fontawesome.com/icons?d=gallery" target="_blank">To
                                                        View Fontawesome Icons</a>
                                                </div>
                                            </div>
                                        </div>
                                        @if($categories->isNotEmpty())
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label class="control-label">{{ trans('general.categories') }}</label>
                                                    <select multiple="multiple" class="multi-select"
                                                            id="my_multi_select3" name="categories[]">
                                                        @foreach($categories as $category)
                                                            <option value="{{ $category->id }}">{{ $category->name }}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                        @endif
                                        @if(!$properties->isEmpty())
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label class="control-label">{{ trans('general.properties') }}
                                                        *</label>
                                                    <select multiple="multiple" class="multi-select"
                                                            id="my_multi_select1" name="properties[]" required>
                                                        <option value="">{{ trans('general.choose_properties') }}</option>
                                                        @foreach($properties as $property)
                                                            <option value="{{ $property->id }}"
                                                                    style="padding-left: 35px">{{ $property->name }}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                        @endif
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
                                                        <label class="control-label sbold tooltips"
                                                               data-container="body" data-placement="top"
                                                               data-original-title="{{ trans('message.active') }}">{{ trans('general.active') }}</label></br>
                                                        <label class="radio-inline">
                                                            <input type="radio" name="active" id="optionsRadios3"
                                                                   checked value="1">
                                                            {{ trans('general.yes') }}</label>
                                                        <label class="radio-inline">
                                                            <input type="radio" name="active" id="optionsRadios4"
                                                                   value="0">
                                                            {{ trans('general.no') }}
                                                        </label>
                                                    </div>
                                                </div>
                                            @endif
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label class="control-label sbold tooltips"
                                                           data-container="body" data-placement="top"
                                                           data-original-title="{{ trans('message.is_multi') }}">{{ trans('general.home_delivery_available') }}</label></br>
                                                    <label class="radio-inline">
                                                        <input type="radio" name="is_multi"
                                                               id="optionsRadios3" value="1">
                                                        {{ trans('general.yes') }}</label>
                                                    <label class="radio-inline">
                                                        <input type="radio" name="is_multi"
                                                               id="optionsRadios4" checked value="0">
                                                        {{ trans('general.no') }}</label>
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group{{ $errors->has('order') ? ' has-error' : '' }}">
                                                    <label for="order"
                                                           class="control-label">{{ trans('general.sequence') }}
                                                        *</label>
                                                    <input id="order" type="number" class="form-control" name="order"
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
