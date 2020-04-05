@extends('backend.layouts.app')
@section('breadcrumbs')
    {{ Breadcrumbs::render('backend.admin.currency.create') }}
@endsection
@section('content')
    <div class="portlet box blue">
        @include('backend.partials.forms.form_title',['title' => trans('general.new_currency')])
        <div class="portlet-body">
            @include('backend.partials._admin_instructions',['title' => trans('general.currencies') ,'message' => trans('message.new_currency')])
            <div class="portlet-body form">
                <form class="horizontal-form" role="form" method="POST"
                      action="{{ route('backend.admin.currency.store') }}" enctype="multipart/form-data">
                    @csrf
                    <div class="form-body">
                        <h3 class="form-section">{{ trans('general.new_currency') }}</h3>
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
                                        <div class="col-md-6">
                                            <div class="form-group{{ $errors->has('name_ar') ? ' has-error' : '' }}">
                                                <label for="name_ar"
                                                       class="control-label">{{ trans('general.name_ar') }}*</label>
                                                <input id="name_ar" type="text" class="form-control" name="name_ar"
                                                       value="{{ old('name_ar') }}"
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
                                        <div class="col-md-6">
                                            <div class="form-group{{ $errors->has('name_en') ? ' has-error' : '' }}">
                                                <label for="name_en"
                                                       class="control-label">{{ trans('general.name_en') }}*</label>
                                                <input id="name_en" type="text" class="form-control" name="name_en"
                                                       value="{{ old('name_en') }}"
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

                                        <div class="col-md-6">
                                            <div class="form-group{{ $errors->has('currency_symbol_ar') ? ' has-error' : '' }}">
                                                <label for="currency_symbol_ar"
                                                       class="control-label">{{ trans('general.currency_symbol_ar') }}
                                                    *</label>
                                                <input id="currency_symbol_ar" type="text" class="form-control"
                                                       name="currency_symbol_ar" value="{{ old('currency_symbol_ar') }}"
                                                       placeholder="{{ trans('general.currency_symbol_ar') }}"
                                                       maxlength="4" required autofocus>
                                                @if ($errors->has('currency_symbol_ar'))
                                                    <span class="help-block">
                                                <strong>
                                                    {{ $errors->first('currency_symbol_ar') }}
                                                </strong>
                                            </span>
                                                @endif
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group{{ $errors->has('currency_symbol_en') ? ' has-error' : '' }}">
                                                <label for="currency_symbol_en"
                                                       class="control-label">{{ trans('general.currency_symbol_en') }}
                                                    *</label>
                                                <input id="currency_symbol_en" type="text" class="form-control"
                                                       name="currency_symbol_en" value="{{ old('currency_symbol_en') }}"
                                                       placeholder="{{ trans('general.currency_symbol_en') }}"
                                                       maxlength="4" required autofocus>
                                                @if ($errors->has('currency_symbol_en'))
                                                    <span class="help-block">
                                                <strong>
                                                    {{ $errors->first('currency_symbol_en') }}
                                                </strong>
                                            </span>
                                                @endif
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group{{ $errors->has('exchange_rate') ? ' has-error' : '' }}">
                                                <label for="exchange_rate"
                                                       class="control-label">{{ trans('general.exchange_rate') }}
                                                    *</label>
                                                <input id="exchange_rate" type="text" class="form-control"
                                                       name="exchange_rate" value="{{ old('exchange_rate') }}"
                                                       placeholder="{{ trans('general.exchange_rate') }}" required
                                                       autofocus>
                                                @if ($errors->has('exchange_rate'))
                                                    <span class="help-block">
                                                <strong>
                                                    {{ $errors->first('exchange_rate') }}
                                                </strong>
                                            </span>
                                                @endif
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            @if(!$allCountries->isEmpty())
                                                <div class="form-group">
                                                    <label for="duration"
                                                           class="control-label">{{ trans('general.country') }}
                                                        *</label>
                                                    <select class="form-control input-xlarge" name="country_id"
                                                            id="country" required="required">
                                                        @foreach($allCountries as $country)
                                                            <option value="{{ $country->id }}">{{ $country->name }}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            @else
                                                <span class="label label-danger">No Countries Listed, Please Create Country First -- All Countries exist already have currency.</span>
                                            @endif
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
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label class="control-label sbold">{{ trans('general.active') }}</label></br>
                                                <label class="radio-inline">
                                                    <input type="radio" name="active" id="optionsRadios3"
                                                           value="1">{{ trans('general.yes') }}</label>
                                                <label class="radio-inline">
                                                    <input type="radio" name="active" id="optionsRadios4" checked
                                                           value="0">{{ trans('general.no') }}</label>
                                            </div>
                                        </div>
                                    </div>
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