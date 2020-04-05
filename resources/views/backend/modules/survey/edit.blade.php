@extends('backend.layouts.app')

@section('content')
    <div class="portlet box blue">
        @include('backend.partials.forms.form_title',['title' => trans('general.edit_survey')])
        <div class="portlet-body form">
            <form class="horizontal-form" role="form" method="POST"
                  action="{{ route('backend.admin.survey.update', $element->id) }}" enctype="multipart/form-data">
                @csrf
                @method('put')
                <div class="form-body">
                    <h3 class="form-section">{{ trans('general.edit_survey') }}</h3>
                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group {{ $errors->has('name') ? ' has-error' : '' }}">
                                <label for="name" class="control-label">{{ trans('general.name') }} *</label>
                                <input id="name"
                                       type="text"
                                       class="form-control"
                                       name="name"
                                       value="{{ $element->name }}"
                                       placeholder="name in arabic"
                                       required autofocus>
                                @if ($errors->has('name'))
                                    <span class="help-block">
                                        <strong>
                                            {{ $errors->first('name') }}
                                        </strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="col-md-2">
                            <div class="form-group {{ $errors->has('price') ? ' has-error' : '' }}">
                                <label for="price" class="control-label">{{ trans('general.price') }}
                                    *</label>
                                <input id="price" type="number" class="form-control tooltips"
                                       data-container="body" data-placement="top" min="1" max="99"
                                       data-original-title="{{ trans('message.price') }}" name="price"
                                       value="{{ $element->price }}"
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
                            <div class="form-group {{ $errors->has('net_price') ? ' has-error' : '' }}">
                                <label for="net_price" class="control-label">{{ trans('general.net_price') }}
                                    *</label>
                                <input id="net_price" type="number" class="form-control tooltips" min="1" max="99"
                                       data-container="body" data-placement="top"
                                       data-original-title="{{ trans('message.net_price') }}" name="net_price"
                                       value="{{ $element->net_price }}"
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
                        <div class="col-md-4">
                            <div class="form-group {{ $errors->has('slug_ar') ? ' has-error' : '' }}">
                                <label for="slug_ar" class="control-label">{{ trans('general.slug_ar') }}*</label>
                                <input id="slug_ar"
                                       type="text"
                                       class="form-control"
                                       name="slug_ar"
                                       value="{{ $element->slug_ar }}"
                                       placeholder="name in arabic"
                                       required autofocus>
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
                                <input id="slug_en"
                                       type="text"
                                       class="form-control"
                                       name="slug_en"
                                       value="{{ $element->slug_en }}"
                                       placeholder="name in english"
                                       required autofocus>
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

                    {{-- email + mobile --}}
                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group{{ $errors->has('order') ? ' has-error' : '' }}">
                                <label for="order" class="control-label">{{ trans('general.sequence') }} *</label>
                                <input id="order"
                                       type="text"
                                       class="form-control"
                                       name="order"
                                       value="{{ $element->order }}"
                                       placeholder="order"
                                       maxlength="2"
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
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="description"
                                       class="control-label">{{ trans('general.description-ar') }}</label>
                                <textarea type="text" class="form-control" id="description_ar" name="description_ar"
                                          aria-multiline="true"
                                          maxlength="500">{{ $element->description_ar }}</textarea>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="description"
                                       class="control-label">{{ trans('general.description_en') }}</label>
                                <textarea type="text" class="form-control" id="description_en" name="description_en"
                                          aria-multiline="true"
                                          maxlength="500">{{ $element->description_en }}</textarea>
                            </div>
                        </div>
                    </div>


                    <div class="row">
                        <hr>
                        @if($questions->isNotEmpty())
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label class="control-label">{{ trans('general.question_list') }}*</label>
                                    <select multiple="multiple" class="multi-select" id="my_multi_select1"
                                            name="questions[]">
                                        @foreach($questions->where('active', true) as $question)
                                            <option value="#" disabled="disabled">Question</option>
                                            <option value="{{ $question->id }}"
                                                    {{ in_array($question->id,$element->questions->pluck('id')->toArray()) ? 'selected' : null  }}
                                            >{{ $question->name_ar }}</option>
                                            @if($question->answers->isNotEmpty())
                                                <option value="#" disabled="disabled"><strong>Answers</strong></option>
                                                <option value="#" disabled="disabled" style="background-color: #0d638f">
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
                    <div class="row">
                        <hr>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label class="control-label sbold">{{ trans('general.active') }}</label></br>
                                <label class="radio-inline">
                                    <input type="radio" name="active" id="optionsRadios3" {{ $element->active ? 'checked' : null  }}
                                           value="1"> {{ trans('general.yes') }}</label>
                                <label class="radio-inline">
                                    <input type="radio" name="active" id="optionsRadios4" {{ !$element->active ? 'checked' : null  }}
                                           value="0">{{ trans('general.no') }}</label>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label class="control-label sbold">{{ trans('general.on_sale') }}</label></br>
                                <label class="radio-inline">
                                    <input type="radio" name="on_sale" id="optionsRadios3" {{ $element->on_sale ? 'checked' : null }}
                                           value="1"> {{ trans('general.yes') }}</label>
                                <label class="radio-inline">
                                    <input type="radio" name="on_sale" id="optionsRadios4" {{ !$element->on_sale ? 'checked' : null  }}
                                           value="0">{{ trans('general.no') }}</label>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label class="control-label sbold">{{ trans('general.is_order') }}</label></br>
                                <label class="radio-inline">
                                    <input type="radio" name="is_order" id="optionsRadios3" {{ $element->is_order ? 'checked' : null }}
                                           value="1"> {{ trans('general.yes') }}</label>
                                <label class="radio-inline">
                                    <input type="radio" name="is_order" id="optionsRadios4" {{ !$element->is_order ? 'checked' : null  }}
                                           value="0">{{ trans('general.no') }}</label>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label class="control-label sbold">{{ trans('general.on_home') }}</label></br>
                                <label class="radio-inline">
                                    <input type="radio" name="is_home" id="optionsRadios3" {{ $element->is_home ? 'checked' : null  }}
                                           value="1"> {{ trans('general.yes') }}</label>
                                <label class="radio-inline">
                                    <input type="radio" name="is_home" id="optionsRadios4" {{ !$element->is_home ? 'checked' : null  }}
                                           value="0">{{ trans('general.no') }}</label>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label class="control-label sbold">{{ trans('general.on_desktop') }}</label></br>
                                <label class="radio-inline">
                                    <input type="radio" name="is_desktop" id="optionsRadios3" {{ $element->is_desktop ? 'checked' : null  }}
                                           value="1"> {{ trans('general.yes') }}</label>
                                <label class="radio-inline">
                                    <input type="radio" name="is_desktop" id="optionsRadios4" {{ !$element->is_desktop ? 'checked' : null  }}
                                           value="0">{{ trans('general.no') }}</label>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label class="control-label sbold">{{ trans('general.on_footer') }}</label></br>
                                <label class="radio-inline">
                                    <input type="radio" name="is_footer" id="optionsRadios7" {{ $element->is_footer ? 'checked' : null  }}
                                           value="1"> {{ trans('general.yes') }}</label>
                                <label class="radio-inline">
                                    <input type="radio" name="is_footer" id="optionsRadios8" {{ !$element->is_footer ? 'checked' : null  }}
                                           value="0">{{ trans('general.no') }}</label>
                            </div>
                        </div>
                    </div>
                    <div class="form-actions right">
                        <a class="btn btn-warning" data-toggle="modal" href="#" data-target="#new-question"
                           data-title="New Question/Answer"
                                {{--data-content="Are you sure you want to delete {{ $element->name  }}? "--}}
                                {{--data-form_id="delete-{{ $element->id }}"--}}
                        >{{ trans("general.create_question_or_an_answer") }}</a>
                        {{--<button type="button" class="btn default">Cancel</button>--}}
                        <a href="{!! url()->previous() !!}" class="btn default">{{ trans('general.cancel') }}</a>
                        <button type="submit" class="btn btn-info">
                            <i class="fa fa-save"></i> {{ trans('general.save') }}
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
    @include('backend.partials.forms._modal_question_answer_create')
@endsection