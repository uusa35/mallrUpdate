@extends('backend.layouts.app')

@section('breadcrumbs')
{{ Breadcrumbs::render('backend.admin.country.index') }}
@endsection
@section('content')
<div class="row">
    <div class="col-md-12">
        <!-- BEGIN EXAMPLE TABLE PORTLET-->
        <div class="portlet light ">
            @include('backend.partials.forms.form_title',['title' => trans('general.countries')])
            <div class="portlet-body">
                @include('backend.partials._admin_instructions',['title' => trans('general.countries') ,'message' => trans('message.index_country')])
                <table id="dataTable" class="table table-striped table-bordered table-hover" cellspacing="0" width="100%">
                    <thead>
                        <tr>
                            <th>{{ trans('general.id') }}</th>
                            <th>{{ trans('general.name_ar') }}</th>
                            <th>{{ trans('general.name_en') }}</th>
                            <th>{{ trans('general.flag') }}</th>
                            <th>{{ trans('general.calling_code') }}</th>
                            <th>{{ trans('general.active') }}</th>
                            <th>{{ trans('general.country_code') }}</th>
                            <th>{{ trans('general.sequence') }}</th>
                            <th>{{ trans('general.fixed_shipment_charge') }}</th>
                            <th>{{ trans('general.actions') }}</th>
                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                            <th>{{ trans('general.id') }}</th>
                            <th>{{ trans('general.name_ar') }}</th>
                            <th>{{ trans('general.name_en') }}</th>
                            <th>{{ trans('general.flag') }}</th>
                            <th>{{ trans('general.calling_code') }}</th>
                            <th>{{ trans('general.active') }}</th>
                            <th>{{ trans('general.country_code') }}</th>
                            <th>{{ trans('general.sequence') }}</th>
                            <th>{{ trans('general.fixed_shipment_charge') }}</th>
                            <th>{{ trans('general.actions') }}</th>
                        </tr>
                    </tfoot>
                    <tbody>
                        @foreach($elements as $element)
                        <tr>
                            <td>{{ $element->id }}</td>
                            <td>{{ $element->slug_ar }}</td>
                            <td>{{ $element->slug_en }}</td>
                            <td>
                                <img class="img-xs img-rounded" src="{{ $element->getCurrentImageAttribute() }}" alt="">
                            </td>
                            <td>{{ $element->calling_code }}</td>
                            <td>
                                <span class="label {{ activeLabel($element->active) }}">{{ activeText($element->active) }}</span>
                            </td>
                            <td>{{ $element->country_code }}</td>
                            <td>{{ $element->order }}</td>
                            <td>{{ $element->fixed_shipment_charge }} {{ trans('general.kd') }}</td>
                            <td>
                                <div class="btn-group pull-right">
                                    <button type="button" class="btn green btn-sm btn-outline dropdown-toggle" data-toggle="dropdown"> {{ trans('general.actions') }}
                                        <i class="fa fa-angle-down"></i>
                                    </button>
                                    <ul class="dropdown-menu pull-right" role="menu">
                                        <li>
                                            <a href="{{ route('backend.admin.country.edit',$element->id) }}">
                                                <i class="fa fa-fw fa-edit"></i>{{ trans('general.edit') }}</a>
                                        </li>
                                        <li>
                                            <a href="{{ route('backend.admin.country.show',$element->id) }}">
                                                <i class="fa fa-fw fa-eye-slash"></i>{{ trans('general.view_details') }}</a>
                                        </li>
                                        @if($elements->where('active', true)->count() > 1)
                                        <li>
                                            <a href="{{ route('backend.activate',['model' => 'country','id' => $element->id]) }}">
                                                <i class="fa fa-fw fa-check-circle"></i> {{ trans('general.toggle_active') }}</a>
                                        </li>
                                        @endif
                                        @if(!$element->currency)
                                        <li>
                                            <a data-toggle="modal" href="#" data-target="#basic" data-title="Delete" data-content="Are you sure you want to delete page {{ $element->name }}? " data-form_id="delete-{{ $element->id }}">
                                                <i class="fa fa-fw fa-recycle"></i> {{ trans('general.delete') }}</a>
                                            <form method="post" id="delete-{{ $element->id }}" action="{{ route('backend.admin.country.destroy',$element->id) }}">
                                                @csrf
                                                <input type="hidden" name="_method" value="delete" />
                                                <button type="submit" class="btn btn-del hidden">
                                                    <i class="fa fa-fw fa-times-circle"></i> {{ trans('general.delete') }}
                                                </button>
                                            </form>
                                        </li>
                                        @endif
                                    </ul>
                                </div>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection
