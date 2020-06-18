@extends('backend.layouts.app')
@section('breadcrumbs')
    {{ Breadcrumbs::render('backend.admin.page.edit', $element) }}
@endsection

@section('content')
    <div class="portlet box blue">
        @include('backend.partials.forms.form_title',['title' => trans('general.edit_page')])
        <div class="portlet-body">
            @include('backend.partials._admin_instructions',['title' => trans('general.pages') ,'message' => trans('message.edit_page')])
            <div class="portlet-body form">
                <form class="horizontal-form" role="form" method="POST"
                      action="{{ route('backend.admin.page.update', $element->id) }}" enctype="multipart/form-data">
                    @csrf
                    @method('put')
                    <div class="form-body">
                        <h3 class="form-section">{{ trans('general.edit_page') }}</h3>
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
                                            <div class="form-group {{ $errors->has('title_ar') ? ' has-error' : '' }}">
                                                <label for="title_ar"
                                                       class="control-label">{{ trans('general.title_ar') }}*</label>
                                                <input id="title_ar" type="text" class="form-control" name="title_ar"
                                                       value="{{ $element->title_ar }}"
                                                       placeholder="{{ trans('general.title_ar') }}" required autofocus>
                                                @if ($errors->has('title_ar'))
                                                    <span class="help-block">
                                                <strong>
                                                    {{ $errors->first('title_ar') }}
                                                </strong>
                                            </span>
                                                @endif
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group{{ $errors->has('title_en') ? ' has-error' : '' }}">
                                                <label for="title_en"
                                                       class="control-label">{{ trans('general.title_en') }}*</label>
                                                <input id="title_en" type="text" class="form-control" name="title_en"
                                                       value="{{ $element->title_en }}"
                                                       placeholder="{{ trans('general.title_en') }}" required autofocus>
                                                @if ($errors->has('title_en'))
                                                    <span class="help-block">
                                                <strong>
                                                    {{ $errors->first('title_en') }}
                                                </strong>
                                            </span>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
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
                                        <div class="col-md-6">
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
                                    </div>
                                    <div class="row">
                                        <div class="col-md-3">
                                            <div class="form-group{{ $errors->has('url') ? ' has-error' : '' }}">
                                                <label for="url" class="control-label">{{ trans('general.url') }}
                                                    *</label>
                                                <input id="url" type="url" class="form-control" name="url"
                                                       value="{{ $element->url }}"
                                                       placeholder="{{ trans('general.url') }}" autofocus>
                                                @if ($errors->has('url'))
                                                    <span class="help-block">
                                                <strong>
                                                    {{ $errors->first('url') }}
                                                </strong>
                                            </span>
                                                @endif
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group{{ $errors->has('order') ? ' has-error' : '' }}">
                                                <label for="order" class="control-label">{{ trans('general.sequence') }}
                                                    *</label>
                                                <input id="order" type="number" class="form-control" name="order"
                                                       value="{{ $element->order }}"
                                                       placeholder="{{ trans('general.order') }}" required autofocus>
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
                                                <input type="file" class="form-control" name="image"
                                                       placeholder="{{ trans('general.main_image') }}">
                                                <label for="form_control_1">{{ trans('general.main_image') }}*</label>
                                                <div class="help-block text-left">
                                                    W * H - Best fit 1024 x 800 pixels
                                                </div>
                                            </div>
                                        </div>
                                        @if($element->getCurrentImageAttribute())
                                            <div class="col-lg-1">
                                                <img class="img-responsive img-sm"
                                                     src="{{ $element->getCurrentImageAttribute() }}"
                                                     alt="">
                                                <a href="{{ route("backend.admin.image.clear",['model' => 'page', 'id' => $element->id ,'colName' => 'image']) }}"><i
                                                            class="fa fa-fw fa-times"></i></a>
                                            </div>
                                        @endif
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="content_ar"
                                                       class="control-label">{{ trans('general.content_ar') }}</label>
                                                <textarea type="text" class="form-control tooltips tinymce"
                                                          data-container="body" data-placement="top"
                                                          data-original-title="{{ trans('message.content_ar') }}"
                                                          id="content_ar" name="content_ar" aria-multiline="true"
                                                          maxlength="500">{!! $element->content_ar  !!}</textarea>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="content_en"
                                                       class="control-label">{{ trans('general.content_en') }}</label>
                                                <textarea type="text" class="form-control tooltips tinymce"
                                                          data-container="body" data-placement="top"
                                                          data-original-title="{{ trans('message.content_en') }}"
                                                          id="content_en" name="content_en" aria-multiline="true"
                                                          maxlength="500">{!! $element->content_en  !!}</textarea>
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
                                                           value="1" {{ $element->active ? 'checked' : null }}> {{ trans('general.yes') }}
                                                </label>
                                                <label class="radio-inline">
                                                    <input type="radio" name="active" id="optionsRadios4"
                                                           value="0" {{ !$element->active ? 'checked' : null }}> {{ trans('general.no') }}
                                                </label>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label class="control-label sbold">{{ trans('general.on_menu_desktop') }}</label></br>
                                                <label class="radio-inline">
                                                    <input type="radio" name="on_menu_desktop" id="optionsRadios3"
                                                           value="1" {{ $element->on_menu_desktop ? 'checked' : null }}> {{ trans('general.yes') }}
                                                </label>
                                                <label class="radio-inline">
                                                    <input type="radio" name="on_menu_desktop" id="optionsRadios4"
                                                           value="0" {{ !$element->on_menu_desktop ? 'checked' : null }}>{{ trans('general.no') }}
                                                </label>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label class="control-label sbold">{{ trans('general.on_menu_mobile') }}</label></br>
                                                <label class="radio-inline">
                                                    <input type="radio" name="on_menu_mobile" id="optionsRadios3"
                                                           value="1" {{ $element->on_menu_mobile ? 'checked' : null }}> {{ trans('general.yes') }}
                                                </label>
                                                <label class="radio-inline">
                                                    <input type="radio" name="on_menu_mobile" id="optionsRadios4"
                                                           value="0" {{ !$element->on_menu_mobile ? 'checked' : null }}> {{ trans('general.no') }}
                                                </label>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label class="control-label sbold">{{ trans('general.on_footer') }}</label></br>
                                                <label class="radio-inline">
                                                    <input type="radio" name="on_footer" id="optionsRadios3"
                                                           value="1" {{ $element->on_footer ? 'checked' : null }}> {{ trans('general.yes') }}
                                                </label>
                                                <label class="radio-inline">
                                                    <input type="radio" name="on_footer" id="optionsRadios4"
                                                           value="0" {{ !$element->on_footer ? 'checked' : null }}>{{ trans('general.no') }}
                                                </label>
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
