@extends('backend.layouts.app')
@section('content')
    <div class="portlet box blue">
        @include('backend.partials.forms.form_title')
        <div class="portlet-body form">
            <form class="horizontal-form" role="form" method="POST"
                  action="{{ route('backend.plan.store') }}">
                {{ csrf_field() }}
                <div class="form-body">
                    <h3 class="form-section">Create Plan</h3>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group{{ $errors->has('name_ar') ? ' has-error' : '' }}">
                                <label for="name_ar" class="control-label">Name Arabic*</label>
                                <input id="name_ar"
                                       type="text"
                                       class="form-control"
                                       name="name_ar"
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
                                       placeholder="name in english"
                                       required autofocus>
                                @if ($errors->has('name_en'))
                                    <span class="help-block">
                                        <strong>
                                            {{ $errors->first('name') }}
                                        </strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                    </div>


                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group{{ $errors->has('sale_price') ? ' has-error' : '' }}">
                                <label for="sale_price" class="control-label">sale_price</label>
                                <input id="sale_price"
                                       type="number"
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
                        <div class="col-md-4">
                            <div class="form-group{{ $errors->has('price') ? ' has-error' : '' }}">
                                <label for="price" class="control-label">price</label>
                                <input id="price"
                                       type="number"
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
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="duration" class="control-label">duration</label>
                                <select class="form-control input-xlarge" name="duration" id="duration">
                                    <option value="1">1 Year</option>
                                    <option value="2">2 Years</option>
                                    <option value="3">3 Years</option>
                                    <option value="4">4 Years</option>
                                    <option value="5">5 Years</option>
                                </select>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group{{ $errors->has('caption') ? ' has-error' : '' }}">
                                <label for="caption" class="control-label">caption arabic</label>
                                <input id="caption_ar"
                                       type="text"
                                       class="form-control"
                                       name="caption_ar"
                                       placeholder="caption arabic"
                                       required autofocus>
                                @if ($errors->has('caption'))
                                    <span class="help-block">
                                        <strong>
                                            {{ $errors->first('caption_ar') }}
                                        </strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group{{ $errors->has('caption') ? ' has-error' : '' }}">
                                <label for="caption" class="control-label">caption english</label>
                                <input id="caption_en"
                                       type="text"
                                       class="form-control"
                                       name="caption_en"
                                       placeholder="caption english"
                                       required autofocus>
                                @if ($errors->has('caption'))
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
                                <textarea type="text" class="form-control" id="description_ar" name="description_ar"
                                          aria-multiline="true"
                                          maxlength="500">
                                </textarea>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="description" class="control-label">description english</label>
                                <textarea type="text" class="form-control" id="description_en" name="description_en"
                                          aria-multiline="true"
                                          maxlength="500">
                                </textarea>
                            </div>
                        </div>
                    </div>


                    {{--<div class="form-group{{ $errors->has('extra_fees') ? ' has-error' : '' }}">--}}
                    {{--<label for="price" class="col-md-4 control-label">extra_fees</label>--}}
                    {{--<div class="col-md-6">--}}
                    {{--<input id="extra_fees"--}}
                    {{--type="number"--}}
                    {{--class="form-control"--}}
                    {{--name="extra_fees"--}}
                    {{--min="1" max="99"--}}
                    {{--placeholder="extra_fees"--}}
                    {{--required autofocus>--}}
                    {{--@if ($errors->has('extra_fees'))--}}
                    {{--<span class="help-block">--}}
                    {{--<strong>--}}
                    {{--{{ $errors->first('extra_fees') }}--}}
                    {{--</strong>--}}
                    {{--</span>--}}
                    {{--@endif--}}
                    {{--</div>--}}
                    {{--</div>--}}


                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="control-label sbold">active</label></br>
                                <label class="radio-inline">
                                    <input type="radio" name="active" id="optionsRadios1"
                                           value="1"> active </label>
                                <label class="radio-inline">
                                    <input type="radio" name="active" id="optionsRadios2"
                                           value="0"> not_Active</label>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="control-label sbold">On Sale</label></br>
                                <label class="radio-inline">
                                    <input type="radio" name="on_sale" id="optionsRadios3"
                                           value="1"> on_sale </label>
                                <label class="radio-inline">
                                    <input type="radio" name="on_sale" id="optionsRadios4"
                                           value="0"> not_on_sale</label>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="control-label sbold">is_paid</label></br>
                                <label class="radio-inline">
                                    <input type="radio" name="is_paid" id="optionsRadios5"
                                           value="1"> is_paid </label>
                                <label class="radio-inline">
                                    <input type="radio" name="is_paid" id="optionsRadios6"
                                           value="0"> not_is_paid</label>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="control-label sbold">has_images</label></br>
                                <label class="radio-inline">
                                    <input type="radio" name="has_images" id="optionsRadios7"
                                           value="1"> has_images </label>
                                <label class="radio-inline">
                                    <input type="radio" name="has_images" id="optionsRadios8"
                                           value="0"> not_has_images</label>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="control-label sbold">has_offer</label></br>
                                <label class="radio-inline">
                                    <input type="radio" name="has_offer" id="optionsRadios9"
                                           value="1"> has_offer </label>
                                <label class="radio-inline">
                                    <input type="radio" name="has_offer" id="optionsRadios10"
                                           value="0"> not_has_offer</label>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="control-label sbold">has_branches</label></br>
                                <label class="radio-inline">
                                    <input type="radio" name="has_branches" id="optionsRadios11"
                                           value="1"> has_branches </label>
                                <label class="radio-inline">
                                    <input type="radio" name="has_branches" id="optionsRadios12"
                                           value="0"> not_has_branches</label>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="control-label sbold">has_label</label></br>
                                <label class="radio-inline">
                                    <input type="radio" name="has_label" id="optionsRadios13"
                                           value="1"> has_label </label>
                                <label class="radio-inline">
                                    <input type="radio" name="has_label" id="optionsRadios14"
                                           value="0"> not_has_label</label>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="control-label sbold">show_first</label></br>
                                <label class="radio-inline">
                                    <input type="radio" name="show_first" id="optionsRadios15"
                                           value="1"> show_first </label>
                                <label class="radio-inline">
                                    <input type="radio" name="show_first" id="optionsRadios16"
                                           value="0"> not_show_first</label>
                            </div>
                        </div>
                    </div>

                    @include('backend.partials.forms._btn-group')
                </div>
            </form>
        </div>
    </div>
@endsection