@extends('backend.layouts.app')
@section('breadcrumbs')
    {{ Breadcrumbs::render('backend.admin.survey.create') }}
@endsection
@section('content')
    <div class="portlet box blue">
        @include('backend.partials.forms.form_title',['title' => trans('general.create_survey')])
        <div class="portlet-body">
            @include('backend.partials._admin_instructions',['title' => trans('general.surveys') ,'message' => trans('message.admin_survey_message')])
            <div class="portlet-body form">
                <form class="horizontal-form" role="form" method="POST"
                      action="{{ route('backend.admin.survey.store') }}" enctype="multipart/form-data">
                    @csrf
                    <div class="form-body">
                        <h3 class="form-section">{{ trans('general.create_survey') }}</h3>
                        {{--name arabic / name english --}}
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
                                            <div class="form-group {{ $errors->has('name') ? ' has-error' : '' }}">
                                                <label for="name" class="control-label">{{ trans('general.name') }}
                                                    *</label>
                                                <input id="name" type="text" class="form-control tooltips"
                                                       data-container="body" data-placement="top"
                                                       data-original-title="{{ trans('message.name') }}" name="name"
                                                       value="{{ old('name') }}"
                                                       placeholder="{{ trans('general.name') }}" required autofocus>
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
                                            <div class="form-group {{ $errors->has('price') ? ' has-error' : '' }}">
                                                <label for="price" class="control-label">{{ trans('general.price') }}
                                                    *</label>
                                                <input id="price" type="number" class="form-control tooltips"
                                                       data-container="body" data-placement="top"
                                                       data-original-title="{{ trans('message.price') }}" price="price"
                                                       value="{{ old('price') }}"
                                                       placeholder="{{ trans('general.price') }}" required autofocus>
                                                @if ($errors->has('price'))
                                                    <span class="help-block">
                                                <strong>
                                                    {{ $errors->first('price') }}
                                                </strong>
                                            </span>
                                                @endif
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group {{ $errors->has('slug_ar') ? ' has-error' : '' }}">
                                                <label for="slug_ar"
                                                       class="control-label">{{ trans('general.slug_ar') }}*</label>
                                                <input id="slug_ar" type="text" class="form-control tooltips"
                                                       data-container="body" data-placement="top"
                                                       data-original-title="{{ trans('message.slug_ar') }}"
                                                       name="slug_ar" value="{{ old('slug_ar') }}"
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
                                                <input id="slug_en" type="text" class="form-control tooltips"
                                                       data-container="body" data-placement="top"
                                                       data-original-title="{{ trans('message.slug_en') }}"
                                                       name="slug_en" value="{{ old('slug_en') }}"
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
                                        <div class="col-md-2">
                                            <div class="form-group{{ $errors->has('price') ? ' has-error' : '' }}">
                                                <label for="price"
                                                       class="control-label">{{ trans('general.price') }}*</label>
                                                <input id="price" type="number" class="form-control tooltips"
                                                       data-container="body" data-placement="top"
                                                       data-original-title="{{ trans('message.price') }}"
                                                       name="price" value="{{ old('price') }}"
                                                       placeholder="{{ trans('general.price') }}" required autofocus>
                                                @if ($errors->has('price'))
                                                    <span class="help-block">
                                                <strong>
                                                    {{ $errors->first('price') }}
                                                </strong>
                                            </span>
                                                @endif
                                            </div>
                                        </div>
                                        <div class="col-md-2">
                                            <div class="form-group{{ $errors->has('net_price') ? ' has-error' : '' }}">
                                                <label for="net_price"
                                                       class="control-label">{{ trans('general.net_price') }}*</label>
                                                <input id="net_price" type="number" class="form-control tooltips"
                                                       data-container="body" data-placement="top"
                                                       data-original-title="{{ trans('message.net_price') }}"
                                                       name="net_price" value="{{ old('net_price') }}"
                                                       placeholder="{{ trans('general.net_price') }}" required autofocus>
                                                @if ($errors->has('net_price'))
                                                    <span class="help-block">
                                                <strong>
                                                    {{ $errors->first('net_price') }}
                                                </strong>
                                            </span>
                                                @endif
                                            </div>
                                        </div>
                                    </div>


                                    {{-- email + mobile --}}


                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="description"
                                                       class="control-label">{{ trans('general.description_ar') }}</label>
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
                                                       class="control-label">{{ trans('general.description_en') }}</label>
                                                <textarea type="text" class="form-control tooltips"
                                                          data-container="body" data-placement="top"
                                                          data-original-title="{{ trans('message.description_en') }}"
                                                          id="description_en" name="description_en"
                                                          aria-multiline="true"
                                                          maxlength="500">{{ old('description_en') }}</textarea>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group{{ $errors->has('order') ? ' has-error' : '' }}">
                                                <label for="order" class="control-label">{{ trans('general.sequence') }}
                                                    *</label>
                                                <input id="order" type="number" class="form-control tooltips"
                                                       data-container="body" data-placement="top"
                                                       data-original-title="{{ trans('message.order') }}" name="order"
                                                       value="{{ old('order') }}"
                                                       placeholder="{{ trans('general.order') }}" maxlength="2"
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


                                    <div class="row">
                                        <hr>
                                        @if($questions->isNotEmpty())
                                            <div class="col-lg-6">
                                                <div class="form-group">
                                                    <label class="control-label">{{ trans('general.questions_list') }}
                                                        *</label>
                                                    <select multiple="multiple" class="multi-select tooltips"
                                                            data-container="body" data-placement="top"
                                                            data-original-title="{{ trans('message.questions') }}"
                                                            id="my_multi_select1" name="questions[]">
                                                        @foreach($questions->where('active', true) as $question)
                                                            <option value="#" disabled="disabled">Question</option>
                                                            <option value="{{ $question->id }}">{{ $question->name_ar }}</option>
                                                            @if($question->answers->isNotEmpty())
                                                                <option value="#" disabled="disabled">
                                                                    <strong>Answers</strong></option>
                                                                <option value="#" disabled="disabled"
                                                                        style="background-color: #0d638f">
                                                                    @foreach($question->answers as $a)
                                                                        {{ $a->name }},
                                                                    @endforeach
                                                                </option>
                                                            @endif
                                                        @endforeach
                                                    </select>
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
                                        <hr>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label class="control-label sbold tooltips" data-container="body"
                                                       data-placement="top"
                                                       data-original-title="{{ trans('message.active') }}">{{ trans('general.active') }}</label></br>
                                                <label class="radio-inline">
                                                    <input type="radio" name="active" id="optionsRadios3"
                                                           value="1"> {{ trans('general.yes') }}</label>
                                                <label class="radio-inline">
                                                    <input type="radio" name="active" id="optionsRadios4" checked
                                                           value="0"> {{ trans('general.no') }}</label>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label class="control-label sbold tooltips" data-container="body"
                                                       data-placement="top"
                                                       data-original-title="{{ trans('message.on_sale') }}">{{ trans('general.on_sale') }}</label></br>
                                                <label class="radio-inline">
                                                    <input type="radio" name="on_sale" id="optionsRadios3"
                                                           value="1"> {{ trans('general.yes') }}</label>
                                                <label class="radio-inline">
                                                    <input type="radio" name="on_sale" id="optionsRadios4" checked
                                                           value="0"> {{ trans('general.no') }}</label>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label class="control-label sbold tooltips" data-container="body"
                                                       data-placement="top"
                                                       data-original-title="{{ trans('message.order') }}">{{ trans('general.order') }}</label></br>
                                                <label class="radio-inline">
                                                    <input type="radio" name="is_order" id="optionsRadios3"
                                                           value="1"> {{ trans('general.yes') }}</label>
                                                <label class="radio-inline">
                                                    <input type="radio" name="is_order" id="optionsRadios4" checked
                                                           value="0"> {{ trans('general.no') }}</label>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label class="control-label sbold tooltips" data-container="body"
                                                       data-placement="top"
                                                       data-original-title="{{ trans('message.is_home') }}"> {{ trans('general.is_home') }}</label></br>
                                                <label class="radio-inline">
                                                    <input type="radio" name="is_home" id="optionsRadios3"
                                                           value="1"> {{ trans('general.yes') }}</label>
                                                <label class="radio-inline">
                                                    <input type="radio" name="is_home" id="optionsRadios4" checked
                                                           value="0"> {{ trans('general.no') }}</label>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label class="control-label sbold tooltips" data-container="body"
                                                       data-placement="top"
                                                       data-original-title="{{ trans('message.is_desktop') }}"> {{ trans('general.is_desktop') }}</label></br>
                                                <label class="radio-inline">
                                                    <input type="radio" name="is_desktop" id="optionsRadios3"
                                                           value="1"> {{ trans('general.yes') }}</label>
                                                <label class="radio-inline">
                                                    <input type="radio" name="is_desktop" id="optionsRadios4" checked
                                                           value="0">{{ trans('general.no') }}</label>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label class="control-label sbold tooltips" data-container="body"
                                                       data-placement="top"
                                                       data-original-title="{{ trans('message.is_footer') }}">{{ trans('general.is_footer') }}</label></br>
                                                <label class="radio-inline">
                                                    <input type="radio" name="is_footer" id="optionsRadios7" checked
                                                           value="1"> {{ trans('general.yes') }}</label>
                                                <label class="radio-inline">
                                                    <input type="radio" name="is_footer" id="optionsRadios8"
                                                           value="0">{{ trans('general.no') }}</label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-actions right">
                                        <a class="btn btn-warning" data-toggle="modal" href="#"
                                           data-target="#new-question"
                                           data-title="New Question/Answer" {{--data-content="Are you sure you want to delete {{ $element->name  }}? "--}}
                                                {{--data-form_id="delete-{{ $element->id }}" --}}> {{ trans('general.new_question') }}</a>
                                        {{--<button type="button" class="btn default"> {{ trans('general.cancel') }}</button>--}}
                                        <a href="{!! url()->previous() !!}"
                                           class="btn default"> {{ trans('general.cancel') }}</a>
                                        <button type="submit" class="btn btn-info">
                                            <i class="fa fa-save"></i> {{ trans('general.save_survey') }}
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </form>
            </div>
        </div>
    </div>
    @include('backend.partials.forms._modal_question_answer_create')
@endsection