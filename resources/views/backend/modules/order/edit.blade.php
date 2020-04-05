@extends('backend.layouts.app')
@section('breadcrumbs')
    {{ Breadcrumbs::render('backend.admin.order.edit', $element) }}
@endsection

@section('content')
    <div class="portlet box blue">
        @include('backend.partials.forms.form_title')
        <div class="portlet-body">
            @include('backend.partials._admin_instructions',['title' => trans('general.order') ,'message' =>
            trans('message.admin_order_message')])
            <div class="portlet-body form">
                <form class="horizontal-form" role="form" method="POST"
                      action="{{ route('backend.admin.order.update', $element->id) }}" enctype="multipart/form-data">
                    @csrf
                    @method('put')
                    <div class="form-body">
                        <h3 class="form-section">{{ trans('general.edit_order') }}</h3>
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
                                            <div class="form-group {{ $errors->has('shipment_reference') ? ' has-error' : '' }}">
                                                <label for="shipment_reference"
                                                       class="control-label">{{ trans('general.shipment_reference') }}
                                                    *</label>
                                                <input id="shipment_reference" type="text" class="form-control"
                                                       shipment_reference="shipment_reference"
                                                       name="shipment_reference"
                                                       value="{{ $element->shipment_reference }}"
                                                       placeholder="{{ trans('general.shipment_reference') }}" required
                                                       autofocus>
                                                @if ($errors->has('shipment_reference'))
                                                    <span class="help-block">
                                                <strong>
                                                    {{ $errors->first('shipment_reference') }}
                                                </strong>
                                            </span>
                                                @endif
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
    </div>
@endsection