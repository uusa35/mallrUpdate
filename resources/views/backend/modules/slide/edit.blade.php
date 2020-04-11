@extends('backend.layouts.app')


@section('breadcrumbs')
    {{ Breadcrumbs::render('backend.slide.edit', $element) }}
@endsection

@section('content')
    <div class="portlet box blue">
        @include('backend.partials.forms.form_title')
        <div class="portlet-body">
            @include('backend.partials._admin_instructions',['title' => trans('general.slides') ,'message' => trans('message.index_slide')])
            <div class="portlet-body form">
                <form class="horizontal-form" role="form" method="POST"
                      action="{{ route('backend.slide.update', $element->id) }}" enctype="multipart/form-data">
                    @csrf
                    @method('put')
                    <input type="hidden" name="slidable_id" value="{{ $element->slidable_id }}">
                    <input type="hidden" name="slidable_type" value="{{ $element->slidable_type }}">
                    <div class="form-body">
                        <h3 class="form-section">{{ trans('general.new_slide') }}</h3>
                        <div class="portlet box blue ">
                            <div class="portlet-title">
                                <div class="caption">
                                    <i class="fa fa-gift"></i> {{ trans('general.slide_main_details') }}
                                </div>
                            </div>
                            <div class="portlet-body form">
                                <div class="form-body">
                                    <div class="row">
                                        <div class="col-md-4">
                                            <div class="form-group form-md-line-input">
                                                <input type="text" value="{{ $element->title_ar }}" class="form-control tooltips" data-container="body" data-placement="top"
                                                       data-original-title="{{ trans('message.title_ar') }}"
                                                       name="title_ar" placeholder="{{ trans('general.title_ar') }}">
                                                <label for="form_control_1"> {{ trans('general.title_ar') }} *</label>
                                                <span class="help-block">please enter proper title</span>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group form-md-line-input">
                                                <input type="text" value="{{ $element->title_en }}" class="form-control tooltips" data-container="body" data-placement="top"
                                                       data-original-title="{{ trans('message.title_en') }}"
                                                       name="title_en" placeholder="{{ trans('general.title_en') }}">
                                                <label for="form_control_1">{{ trans('general.title_en') }}*</label>
                                                <span class="help-block">please enter proper title</span>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group form-md-line-input">
                                                <input type="text" value="{{ $element->caption_ar }}"
                                                       class="form-control tooltips" data-container="body" data-placement="top"
                                                       data-original-title="{{ trans('message.caption_ar') }}" name="caption_ar"
                                                       placeholder="{{ trans('general.caption_ar') }}">
                                                <label for="form_control_1"> {{ trans('general.caption_ar') }} *</label>
                                                <span class="help-block">please enter proper caption</span>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group form-md-line-input">
                                                <input type="text" value="{{ $element->caption_en }}"
                                                       class="form-control tooltips" data-container="body" data-placement="top"
                                                       data-original-title="{{ trans('message.caption-en') }}" name="caption_en"
                                                       placeholder="{{ trans('general.caption_en') }}">
                                                <label for="form_control_1">{{ trans('general.caption_en') }}*</label>
                                                <span class="help-block">please enter proper caption</span>
                                            </div>
                                        </div>
                                        <div class="col-md-2">
                                            <div class="form-group form-md-line-input">
                                                <input type="number" max="99" mvaxlength="2" class="form-control tooltips" data-container="body" data-placement="top"
                                                       data-original-title="{{ trans('message.sequence') }}"
                                                       name="order" value="{{ $element->order }}"
                                                       placeholder="{{ trans('general.sequence') }}">
                                                <label for="form_control_1">{{ trans('general.sequence') }}*</label>
                                                <span class="help-block">slide Order is a number</span>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="form_control_1">{{ trans('general.image') }}*</label>
                                                <input type="file" class="form-control tooltips" data-container="body" data-placement="top"
                                                       data-original-title="{{ trans('message.image') }}" name="image"
                                                       placeholder="{{ trans('general.image') }}">

                                                <div class="help-block text-left">
                                                    {{ trans('message.best_fit',['width' => '1900 px', 'height' => '1000 px']) }}
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-2">
                                            <img src="{{ $element->imageThumbLink }}" alt=""
                                                 class="img-responsive img-rounded">
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="form_control_1">{{ trans('general.path') }}</label>
                                                <input type="file" class="form-control tooltips" data-container="body" data-placement="top"
                                                       data-original-title="{{ trans('message.path') }}" name="path"
                                                       placeholder="{{ trans('general.path') }}">
                                                <div class="help-block text-left">
                                                    files shall not exceed 50 MB
                                                    @if($element->path)
                                                        <a href="{{ asset('FILES'.$element->path) }}"
                                                           class="href">{{ trans('general.path') }}</a>
                                                    @endif
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group form-md-line-input">
                                                <input type="url" class="form-control tooltips" data-container="body" data-placement="top"
                                                       data-original-title="{{ trans('message.url') }}" name="url"
                                                       value="{{ $element->url }}"
                                                       placeholder="{{ trans('general.url') }}">
                                                <label for="form_control_1">{{ trans('general.url') }}*</label>
                                                <span class="help-block">full link is only allowed ('http://google.com')</span>
                                            </div>
                                        </div>


                                    </div>
                                </div>
                            </div>
                        </div>

                        @can('isAdminOrAbove')
                            <div class="portlet box blue ">
                                <div class="portlet-title">
                                    <div class="caption">
                                        <i class="fa fa-gift"></i> {{ trans('general.slide_attributes_details') }}
                                    </div>
                                </div>
                                <div class="portlet-body form">
                                    <div class="form-body">
                                        <div class="row">
                                            <div class="col-md-4">
                                                <div class="md-radio-inline">
                                                    <div class="md-radio tooltips" data-container="body" data-placement="top"
                                                         data-original-title="{{ trans('message.active') }}">
                                                        <input type="radio" id="radio51" name="active" value="1"
                                                               class="md-radiobtn  {{ $element->active ? 'checked' : null }}">
                                                        <label for="radio51">
                                                            <span></span>
                                                            <span class="check"></span>
                                                            <span class="box"></span> {{ trans('general.active') }}
                                                        </label>
                                                    </div>
                                                    <div class="md-radio">
                                                        <input type="radio" id="radio52" name="active" value="0"
                                                               class="md-radiobtn" {{ !$element->active ? 'checked' : null }}>
                                                        <label for="radio52">
                                                            <span></span>
                                                            <span class="check"></span>
                                                            <span class="box"></span> {{ trans('general.no') }}</label>
                                                    </div>
                                                </div>
                                            </div>
                                            @can('isAdminOrAbove')
                                                <div class="col-md-4">
                                                    <div class="md-radio-inline">
                                                        <div class="md-radio tooltips" data-container="body" data-placement="top"
                                                             data-original-title="{{ trans('message.on_home') }}">
                                                            <input type="radio" id="radio53" name="on_home" value="1"
                                                                   class="md-radiobtn" {{ $element->on_home ? 'checked' : null }}>
                                                            <label for="radio53">
                                                                <span></span>
                                                                <span class="check"></span>
                                                                <span class="box"></span> {{ trans('general.on_home') }}
                                                            </label>
                                                        </div>
                                                        <div class="md-radio">
                                                            <input type="radio" id="radio54" name="on_home" value="0"
                                                                   class="md-radiobtn" {{ !$element->on_home ? 'checked' : null }}>
                                                            <label for="radio54">
                                                                <span></span>
                                                                <span class="check"></span>
                                                                <span class="box"></span> {{ trans('general.no') }}
                                                            </label>
                                                        </div>
                                                    </div>
                                                </div>
                                            @endcan
                                            @can('isAdminOrAbove')
                                                <div class="col-md-4">
                                                    <div class="md-radio-inline">
                                                        <div class="md-radio tooltips" data-container="body" data-placement="top"
                                                             data-original-title="{{ trans('message.is_intro') }}">
                                                            <input type="radio" id="radio55" name="is_intro" value="1"
                                                                   class="md-radiobtn" {{ $element->is_intro ? 'checked' : null }}>
                                                            <label for="radio55">
                                                                <span></span>
                                                                <span class="check"></span>
                                                                <span class="box"></span> {{ trans('general.is_intro') }}
                                                            </label>
                                                        </div>
                                                        <div class="md-radio">
                                                            <input type="radio" id="radio56" name="is_intro" value="0"
                                                                   class="md-radiobtn" {{ !$element->is_intro ? 'checked' : null }}>
                                                            <label for="radio56">
                                                                <span></span>
                                                                <span class="check"></span>
                                                                <span class="box"></span> {{ trans('general.no') }}
                                                            </label>
                                                        </div>
                                                    </div>
                                                </div>
                                            @endcan
                                        </div>
                                    </div>
                                </div>

                            </div>
                        @else
                            <input type="hidden" name="active" value="{{ $element->active }}">
                            <input type="hidden" name="on_home " value="0">
                            <input type="hidden" name="is_intro" value="0">
                        @endcan
                    </div>
                    @include('backend.partials.forms._btn-group')
                </form>
            </div>
        </div>
@endsection
