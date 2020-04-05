@extends('backend.layouts.app')
@section('content')
    <div class="portlet box blue">
        @include('backend.partials.forms.form_title')
        <div class="portlet-body form">
            <form class="horizontal-form" role="form" method="POST"
                  action="{{ route('backend.plan.update', $element->id) }}">
                {{ csrf_field() }}
                <input type="hidden" name="_method" value="patch">
                <div class="form-body">
                    <h3 class="form-section">Edit Plan</h3>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group{{ $errors->has('name_ar') ? ' has-error' : '' }}">
                                <label for="name_ar" class="control-label">Name Arabic*</label>
                                <input id="name_ar"
                                       type="text"
                                       class="form-control"
                                       name="name_ar"
                                       value="{{ $element->name_ar }}"
                                       placeholder="name in arabic"
                                       required autofocus>
                                @if ($errors->has('name_ar'))
                                    <span class="help-block">
                                        <strong>
                                            {{ $errors->first('name_ar') }}
                                        </strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group{{ $errors->has('name_en') ? ' has-error' : '' }}">
                                <label for="name_en" class="control-label">Name English*</label>
                                <input id="name_en"
                                       type="text"
                                       class="form-control"
                                       name="name_en"
                                       value="{{ $element->name_en }}"
                                       placeholder="name in english"
                                       required autofocus>
                                @if ($errors->has('name_en'))
                                    <span class="help-block">
                                        <strong>
                                            {{ $errors->first('name_en') }}
                                        </strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                    </div>


                    <div class="row">
                        <div class="col-md-2">
                            <div class="form-group{{ $errors->has('sale_price') ? ' has-error' : '' }}">
                                <label for="sale_price" class="control-label">sale_price</label>
                                <input id="sale_price"
                                       type="number"
                                       value="{{ $element->sale_price }}"
                                       class="form-control"
                                       name="sale_price"
                                       min="1" max="99"
                                       placeholder="sale_price"
                                       required autofocus>
                                @if ($errors->has('sale_price'))
                                    <span class="help-block">
                                        <strong>
                                            {{ $errors->first('sale_price') }}
                                        </strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="col-md-2">
                            <div class="form-group{{ $errors->has('price') ? ' has-error' : '' }}">
                                <label for="price" class="control-label">price</label>
                                <input id="price"
                                       type="number"
                                       value="{{ $element->price }}"
                                       class="form-control"
                                       name="price"
                                       min="1" max="99"
                                       placeholder="price"
                                       required autofocus>
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
                            <div class="form-group{{ $errors->has('image_price') ? ' has-error' : '' }}">
                                <label for="image_price" class="control-label">image_price</label>
                                <input id="image_price"
                                       type="number"
                                       value="{{ $element->image_price }}"
                                       class="form-control"
                                       name="image_price"
                                       min="1" max="99"
                                       placeholder="image_price"
                                       required autofocus>
                                @if ($errors->has('image_price'))
                                    <span class="help-block">
                                        <strong>
                                            {{ $errors->first('image_price') }}
                                        </strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="col-md-2">
                            <div class="form-group{{ $errors->has('branch_price') ? ' has-error' : '' }}">
                                <label for="branch_price" class="control-label">branch_price</label>
                                <input id="branch_price"
                                       type="number"
                                       value="{{ $element->branch_price }}"
                                       class="form-control"
                                       name="branch_price"
                                       min="1" max="99"
                                       placeholder="branch_price"
                                       required autofocus>
                                @if ($errors->has('branch_price'))
                                    <span class="help-block">
                                        <strong>
                                            {{ $errors->first('branch_price') }}
                                        </strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="col-md-2">
                            <div class="form-group{{ $errors->has('show_first_fee') ? ' has-error' : '' }}">
                                <label for="show_first_fee" class="control-label">show_first_fee</label>
                                <input id="show_first_fee"
                                       type="number"
                                       value="{{ $element->show_first_fee }}"
                                       class="form-control"
                                       name="show_first_fee"
                                       min="1" max="99"
                                       placeholder="show_first_fee"
                                       required autofocus>
                                @if ($errors->has('show_first_fee'))
                                    <span class="help-block">
                                        <strong>
                                            {{ $errors->first('show_first_fee') }}
                                        </strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="duration" class="control-label">duration</label>
                                <select class="form-control input-xlarge" name="duration">
                                    @for($i=1;$i<=5;$i++)
                                        <option value="{{ $i }}" {{ $element->duration === $i ? "selected" : null }}>{{ $i }}
                                            Year
                                        </option>
                                    @endfor
                                </select>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group{{ $errors->has('caption_ar') ? ' has-error' : '' }}">
                                <label for="caption_ar" class="control-label">caption_ar</label>
                                <input id="caption_ar"
                                       type="text"
                                       class="form-control"
                                       name="caption_ar"
                                       placeholder="caption_ar"
                                       required autofocus>
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
                            <div class="form-group{{ $errors->has('caption_ar') ? ' has-error' : '' }}">
                                <label for="caption_en" class="control-label">caption_en</label>
                                <input id="caption_en"
                                       type="text"
                                       class="form-control"
                                       name="caption_en"
                                       placeholder="caption_en"
                                       required autofocus>
                                @if ($errors->has('caption_en'))
                                    <span class="help-block">
                                        <strong>
                                            {{ $errors->first('caption_en') }}
                                        </strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                    </div>


                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="description" class="control-label">description arabic</label>
                                <textarea type="text" class="form-control" name="description_ar" aria-multiline="true"
                                          maxlength="500">
                                    {{ $element->description_ar }}
                                </textarea>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="description" class="control-label">description english</label>
                                <textarea type="text" class="form-control" name="description_en" aria-multiline="true"
                                          maxlength="500">
                                    {{ $element->description_en }}
                                </textarea>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-body">
                                <label class="form-label">Active</label>
                                <div class="md-radio-inline">
                                    <div class="md-radio">
                                        <input type="radio" id="radio53" name="active" value="1"
                                               class="md-radiobtn" {{ $element->active ? "checked" : null }}>
                                        <label for="radio53">
                                            <span></span>
                                            <span class="check"></span>
                                            <span class="box"></span>active</label>
                                    </div>
                                    <div class="md-radio">
                                        <input type="radio" id="radio54" name="active" value="0"
                                               class="md-radiobtn" {{ $element->active ? null : "checked" }}>
                                        <label for="radio54">
                                            <span></span>
                                            <span class="check"></span>
                                            <span class="box"></span> N/A</label>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-body">
                                <label class="form-label">On Sale</label>
                                <div class="md-radio-inline">
                                    <div class="md-radio">
                                        <input type="radio" id="radio55" name="on_sale" value="1"
                                               class="md-radiobtn" {{ $element->on_sale ? "checked" : null }}>
                                        <label for="radio55">
                                            <span></span>
                                            <span class="check"></span>
                                            <span class="box"></span> on_sale</label>
                                    </div>
                                    <div class="md-radio">
                                        <input type="radio" id="radio56" name="on_sale" value="0" checked
                                               class="md-radiobtn" {{ !$element->on_sale ? "checked" : null }}>
                                        <label for="radio56">
                                            <span></span>
                                            <span class="check"></span>
                                            <span class="box"></span> N/A</label>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-body">
                                <label class="control-label">Is Paid Plan</label>
                                <div class="md-radio-inline">
                                    <div class="md-radio">
                                        <input type="radio" id="radio57" name="is_paid" value="1" checked
                                               class="md-radiobtn" {{ $element->is_paid ? "checked" : null }}>
                                        <label for="radio57">
                                            <span></span>
                                            <span class="check"></span>
                                            <span class="box"></span> is_paid</label>
                                    </div>
                                    <div class="md-radio">
                                        <input type="radio" id="radio80" name="is_paid" value="0"
                                               class="md-radiobtn" {{ !$element->is_paid ? "checked" : null }}>
                                        <label for="radio80">
                                            <span></span>
                                            <span class="check"></span>
                                            <span class="box"></span> N/A</label>
                                    </div>
                                </div>
                            </div>

                        </div>
                        <div class="col-md-6">
                            <div class="form-body">
                                <label class="control-label">Has Images</label>
                                <div class="md-radio-inline">
                                    <div class="md-radio">
                                        <input type="radio" id="radio58" name="has_images" value="1" checked
                                               class="md-radiobtn" {{ $element->has_images ? "checked" : null }}>
                                        <label for="radio58">
                                            <span></span>
                                            <span class="check"></span>
                                            <span class="box"></span> has_images</label>
                                    </div>
                                    <div class="md-radio">
                                        <input type="radio" id="radio59" name="has_images" value="0"
                                               class="md-radiobtn" {{ !$element->has_images ? "checked" : null }}>
                                        <label for="radio59">
                                            <span></span>
                                            <span class="check"></span>
                                            <span class="box"></span> N/A</label>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>


                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-body">
                                <label class="control-label">Has Offer</label>
                                <div class="md-radio-inline">
                                    <div class="md-radio">
                                        <input type="radio" id="radio60" name="has_offer" value="1" checked
                                               class="md-radiobtn" {{ $element->has_offer ? "checked" : null }}>
                                        <label for="radio60">
                                            <span></span>
                                            <span class="check"></span>
                                            <span class="box"></span> has_offer</label>
                                    </div>
                                    <div class="md-radio">
                                        <input type="radio" id="radio61" name="has_offer" value="0"
                                               class="md-radiobtn" {{!$element->has_offer ? "checked" : null }}>
                                        <label for="radio61">
                                            <span></span>
                                            <span class="check"></span>
                                            <span class="box"></span> N/A</label>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-body">
                                <label class="control-label"> Has Branches</label>
                                <div class="md-radio-inline">
                                    <div class="md-radio">
                                        <input type="radio" id="radio61" name="has_branches" value="1" checked
                                               class="md-radiobtn" {{ $element->has_branches ? "checked" : null }}>
                                        <label for="radio61">
                                            <span></span>
                                            <span class="check"></span>
                                            <span class="box"></span> has_branches</label>
                                    </div>
                                    <div class="md-radio">
                                        <input type="radio" id="radio62" name="has_branches" value="0"
                                               class="md-radiobtn" {{ !$element->has_branches ? "checked" : null }}>
                                        <label for="radio62">
                                            <span></span>
                                            <span class="check"></span>
                                            <span class="box"></span> N/A</label>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-body">
                                <label class="control-label">Has Label</label>
                                <div class="md-radio-inline">
                                    <div class="md-radio">
                                        <input type="radio" id="radio62" name="has_label" value="1" checked
                                               class="md-radiobtn" {{ $element->has_label ? "checked" : null }}>
                                        <label for="radio62">
                                            <span></span>
                                            <span class="check"></span>
                                            <span class="box"></span> has_label</label>
                                    </div>
                                    <div class="md-radio">
                                        <input type="radio" id="radio63" name="has_label" value="0"
                                               class="md-radiobtn" {{ !$element->active ? "checked" : null }}>
                                        <label for="radio63">
                                            <span></span>
                                            <span class="check"></span>
                                            <span class="box"></span> N/A</label>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-body">
                                <label class="control-label">Show First</label>
                                <div class="md-radio-inline">
                                    <div class="md-radio">
                                        <input type="radio" id="radio64" name="show_first" value="1" checked
                                               class="md-radiobtn" {{ $element->show_first ? "checked" : null }}>
                                        <label for="radio64">
                                            <span></span>
                                            <span class="check"></span>
                                            <span class="box"></span> show_first</label>
                                    </div>
                                    <div class="md-radio">
                                        <input type="radio" id="radio65" name="show_first" value="0"
                                               class="md-radiobtn" {{ !$element->show_first ? "checked" : null }}>
                                        <label for="radio65">
                                            <span></span>
                                            <span class="check"></span>
                                            <span class="box"></span> N/A</label>
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