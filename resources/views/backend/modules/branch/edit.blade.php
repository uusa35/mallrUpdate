@extends('backend.layouts.app')
@section('breadcrumbs')
    {{ Breadcrumbs::render('backend.branch.edit', $element) }}
@endsection
@section('content')
    <div class="portlet box blue">
        @include('backend.partials.forms.form_title')
        <div class="portlet-body form">
            <form class="horizontal-form" role="form" method="POST"
                  action="{{ route('backend.branch.update', $element->id) }}">
                @csrf
                <input type="hidden" name="_method" value="put">
                <div class="form-body">
                    <div class="row">
                        <div class="col-lg-4">
                            <div class="form-group{{ $errors->has('name_ar') ? ' has-error' : '' }}">
                                <label for="name_ar" class="col-md-4 control-label">name_ar * </label>

                                <input id="name_ar"
                                       type="text"
                                       class="form-control"
                                       name="name_ar"
                                       value="{{ $element->name_ar }}"
                                       placeholder="name_ar"
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
                        <div class="col-lg-4">
                            <div class="form-group{{ $errors->has('name_en') ? ' has-error' : '' }}">
                                <label for="name_en" class="col-md-4 control-label">name_en * </label>

                                <input id="name_en"
                                       type="text"
                                       class="form-control"
                                       name="name_en"
                                       value="{{ $element->name_en }}"
                                       placeholder="name_en"
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
                        <div class="col-lg-4">
                            <div class="form-group{{ $errors->has('address_ar') ? ' has-error' : '' }}">
                                <label for="address_ar" class="col-md-4 control-label">address_ar * </label>

                                <input id="address_ar"
                                       type="text"
                                       class="form-control"
                                       name="address_ar"
                                       value="{{ $element->address_ar }}"
                                       placeholder="address_ar"
                                       required autofocus>
                                @if ($errors->has('address_ar'))
                                    <span class="help-block">
                    <strong>
                        {{ $errors->first('address_ar') }}
                    </strong>
                </span>
                                @endif
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="form-group{{ $errors->has('address_en') ? ' has-error' : '' }}">
                                <label for="address_en" class="col-md-4 control-label">address_en * </label>

                                <input id="address_en"
                                       type="text"
                                       class="form-control"
                                       name="address_en"
                                       value="{{ $element->address_en }}"
                                       placeholder="address_en"
                                       required autofocus>
                                @if ($errors->has('address_en'))
                                    <span class="help-block">
                    <strong>
                        {{ $errors->first('address_en') }}
                    </strong>
                </span>
                                @endif
                            </div>
                        </div>

                        <div class="col-lg-4">
                            <div class="form-group{{ $errors->has('phone') ? ' has-error' : '' }}">
                                <label for="phone" class="col-md-4 control-label">phone*</label>

                                <input id="phone"
                                       type="text"
                                       class="form-control"
                                       name="phone"
                                       value="{{ $element->phone }}"
                                       placeholder="phone"
                                       required autofocus>
                                @if ($errors->has('phone'))
                                    <span class="help-block">
                    <strong>
                        {{ $errors->first('phone') }}
                    </strong>
                </span>
                                @endif
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="form-group{{ $errors->has('longitude') ? ' has-error' : '' }}">
                                <label for="longitude" class="col-md-4 control-label">longitude*</label>

                                <input id="longitude"
                                       type="text"
                                       class="form-control"
                                       name="longitude"
                                       value="{{ $element->longitude }}"
                                       placeholder="longitude"
                                       autofocus>
                                @if ($errors->has('longitude'))
                                    <span class="help-block">
                    <strong>
                        {{ $errors->first('longitude') }}
                    </strong>
                </span>
                                @endif
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="form-group{{ $errors->has('latitude') ? ' has-error' : '' }}">
                                <label for="latitude" class="col-md-4 control-label">latitude*</label>

                                <input id="latitude"
                                       type="text"
                                       class="form-control"
                                       name="latitude"
                                       value="{{ $element->latitude }}"
                                       placeholder="latitude"
                                       autofocus>
                                @if ($errors->has('latitude'))
                                    <span class="help-block">
                                    <strong>
                                        {{ $errors->first('latitude') }}
                                    </strong>
                                </span>
                                @endif
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="form-group">
                                <label for="country_id">Country</label>
                                <select name="country_id" id="countries" class="form-control">
                                    @foreach($countries as $country)
                                        <option value="{{ $country->id }}" {{ $element->country_id === $country->id ? 'selected' : null }}>{{ $country->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>
                    @include('backend.partials.forms._btn-group')
                </div>
            </form>
        </div>
    </div>
@endsection
