@extends('backend.layouts.app')
@section('breadcrumbs')
{{ Breadcrumbs::render('backend.branch.index') }}
@endsection
@section('content')
<div class="row">
    <div class="col-md-12">
        <!-- BEGIN EXAMPLE TABLE PORTLET-->
        <div class="portlet light ">
            @include('backend.partials.forms.form_title')
            <div class="portlet-body">
                @include('backend.partials._admin_instructions',['title' => trans('general.branches') ,'message' => trans('message.index_branch')])
                <table id="dataTable" class="table table-striped table-bordered table-hover" cellspacing="0">
                    <thead>
                        <tr>
                            <th>{{ trans('general.id') }}</th>
                            <th>{{ trans('general.name') }}</th>
                            <th>{{ trans('general.address') }}</th>
                            <th>{{ trans('general.phone') }}</th>
                            <th>{{ trans('general.active') }}</th>
                            <th>{{ trans('general.actions') }}</th>
                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                            <th>{{ trans('general.id') }}</th>
                            <th>{{ trans('general.name') }}</th>
                            <th>{{ trans('general.address') }}</th>
                            <th>{{ trans('general.active') }}</th>
                            <th>{{ trans('general.actions') }}</th>
                        </tr>
                    </tfoot>
                    <tbody>
                        @foreach($elements as $element)
                        <tr>
                            <td>{{ $element->id }}</td>
                            <td>{{ $element->name }}</td>
                            <td>{{ $element->address }}</td>
                            <td>{{ $element->phone }}</td>
                            <td>
                                <span class="label {{ activeLabel($element->active) }}">{{ activeText($element->active) }}</span>
                            </td>
                            <td>
                                <div class="btn-group pull-right">
                                    <button type="button" class="btn green btn-sm btn-outline dropdown-toggle" data-toggle="dropdown"> {{ trans('general.actions') }}
                                        <i class="fa fa-angle-down"></i>
                                    </button>
                                    <ul class="dropdown-menu pull-right" role="menu">
                                        <li>
                                            <a href="{{ route('backend.branch.edit',$element->id) }}">
                                                <i class="fa fa-fw fa-edit"></i>{{ trans('general.edit') }}</a>
                                        </li>
                                        <li>
                                            <a href="{{ route('backend.activate',['model' => 'branch','id' => $element->id]) }}">
                                                <i class="fa fa-fw fa-check-circle"></i> {{ trans('general.toggle_active') }}</a>
                                        </li>
                                        <li>
                                            <form method="post" action="{{ route('backend.branch.destroy',$element->id) }}">
                                                {{ csrf_field() }}
                                                <input type="hidden" name="_method" value="delete" />
                                                <button type="submit" class="btn btn-outline btn-sm red">
                                                    <i class="fa fa-remove"></i>{{ trans('general.delete') }}
                                                </button>
                                            </form>
                                        </li>
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