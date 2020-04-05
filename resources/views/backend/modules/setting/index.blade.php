@extends('backend.layouts.app')

@section('breadcrumbs')
    {{ Breadcrumbs::render('backend.admin.setting.index') }}
@endsection

@section('content')
    <div class="portlet light ">
        @include('backend.partials.forms.form_title',['title' => trans('general.edit_setting')])
        <div class="portlet-body">
            <div class="row">
                <div class="col-lg-12">
                    @include('backend.partials._admin_instructions',['title' => trans('general.settings') ,'message' => trans('message.settings')])
                    <div class="col-lg-12">
                        <div class="col-lg-12">
                            <div class="col-lg-10">
                                <h3 class="text-uppercase">{{ trans('general.edit_setting') }} </h3>
                            </div>
                            <div class="col-lg-">
                                <a href="{{ route('backend.admin.setting.edit',$element->id) }}"
                                   class="btn btn-primary">{{ trans('general.edit') }}</a>
                            </div>
                        </div>
                        <hr>
                        <div class="col-md-6">
                            <table class="table table-striped">
                                <tbody>
                                <tr>
                                    <td>name arabic</td>
                                    <td>{{ $element->company_ar }}</td>
                                </tr>
                                <tr>
                                    <td>name english</td>
                                    <td>{{ $element->company_en }}</td>
                                </tr>
                                <tr>
                                    <td>phone</td>
                                    <td>{{ $element->phone }}</td>
                                </tr>
                                <tr>
                                    <td>mobile</td>
                                    <td>{{ $element->mobile }}</td>
                                </tr>
                                <tr>
                                    <td>whatsapp</td>
                                    <td>{{ $element->whatsapp}}</td>
                                </tr>
                                <tr>
                                    <td>email</td>
                                    <td>{{ $element->email }}</td>
                                </tr>
                                <tr>
                                    <td>address arabic</td>
                                    <td>{{ $element->address_ar }}</td>
                                </tr>
                                <tr>
                                    <td>address en</td>
                                    <td>{{ $element->address_en }}</td>
                                </tr>
                                <tr>
                                    <td>instagram</td>
                                    <td>{{ $element->instagram}}</td>
                                </tr>
                                <tr>
                                    <td>facebook</td>
                                    <td>{{ $element->facebook}}</td>
                                </tr
                                <tr>
                                    <td>twitter</td>
                                    <td>{{ $element->twitter }}</td>
                                </tr>
                                <tr>
                                    <td>snapchat</td>
                                    <td>{{ $element->snapchat}}</td>
                                </tr>
                                <tr>
                                    <td>youtube</td>
                                    <td>{{ $element->youtube }}</td>
                                </tr>
                                </tbody>
                            </table>
                        </div>
                        <div class="col-lg-3">
                            <h5>logo</h5>
                            <img src="{{ asset('storage/uploads/images/large/'.$element->logo) }}"
                                 alt="" class="img-responsive img-thumbnail">
                        </div>
                        @can('index','product')
                            <div class="col-lg-3 img-responsive">
                                <h5>size chart</h5>
                                <img src="{{ asset('storage/uploads/images/large/'.$element->size_chart) }}"
                                     alt="" class="img-responsive img-thumbnail">
                            </div>
                        @endcan
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection