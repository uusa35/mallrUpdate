@extends('backend.layouts.app')


@section('breadcrumbs')
    {{ Breadcrumbs::render('backend.admin.newsletter.index') }}
@endsection

@show
@section('content')
    <div class="row">
        <div class="col-md-12">
            <!-- BEGIN EXAMPLE TABLE PORTLET-->
            <div class="portlet light ">
                @include('backend.partials.forms.form_title',['title' => trans('general.newsletter')])
                <div class="portlet-body">
                    @include('backend.partials._admin_instructions',['title' => trans('general.newsletter') ,'message' => trans('message.index_newsletter')])
                    <table id="dataTable"
                           class="table table-striped table-bordered table-hover table-checkable order-column"
                           id="contactusTable">
                        <thead>
                        <tr>
                            <th>{{ trans('general.id') }}</th>
                            <th>{{ trans('general.name') }}</th>
                            <th>{{ trans('general.email') }}</th>
                            <th>{{ trans('general.status') }}</th>
                            <th>{{ trans('general.created_at') }}</th>
                            <th>{{ trans('general.actions') }}</th>

                        </tr>
                        </thead>
                        <tfoot>
                        <tr>
                            <th>{{ trans('general.id') }}</th>
                            <th>{{ trans('general.name') }}</th>
                            <th>{{ trans('general.email') }}</th>
                            <th>{{ trans('general.status') }}</th>
                            <th>{{ trans('general.created_at') }}</th>
                            <th>{{ trans('general.actions') }}</th>

                        </tr>

                        </tfoot>
                        <tbody>
                        @foreach($subscribers as $element)
                            <tr class="odd gradeX">
                                <td>{{ $element->id }}</td>
                                <td>{{ $element->name }}</td>
                                <td>{{ $element->email }}</td>
                                <td>
                                    <label class="label label-sm {{ ($element->active) ? 'label-success' : 'label-danger'}}">{{ ($element->active) ? 'active' : 'active'}}</label>
                                </td>
                                <td>{{ $element->created_at->format('Y-m-d') }}</td>
                                <td>
                                    <div class="btn-group">
                                        <button class="btn btn-xs green dropdown-toggle" type="button"
                                                data-toggle="dropdown"
                                                aria-expanded="false"> {{ trans('general.actions') }}
                                            <i class="fa fa-angle-down"></i>
                                        </button>
                                        <ul class="dropdown-menu" role="menu">
                                            <li>
                                                <a href="{{ route('backend.admin.newsletter.edit',$element->id) }}">
                                                    <i class="fa fa-eye"></i>{{ trans('general.edit_subscriber') }}</a>
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
            <!-- END EXAMPLE TABLE PORTLET-->
        </div>
    </div>
@endsection