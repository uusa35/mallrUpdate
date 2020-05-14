@extends('backend.layouts.app')

@section('breadcrumbs')
    {{ Breadcrumbs::render('backend.admin.role.index') }}
@endsection

@section('content')
    <div class="row">
        <div class="col-md-12">
            <!-- BEGIN EXAMPLE TABLE PORTLET-->
            <div class="portlet light ">
                @include('backend.partials.forms.form_title')
                <div class="portlet-body">
                    @include('backend.partials._admin_instructions',['title' => trans('general.roles') ,'message' => trans('message.index_role')])
                    <table id="dataTable" class="table table-striped table-bordered table-hover" cellspacing="0"
                           width="100%">
                        <thead>
                        <tr>
                            <th>{{ trans('general.id') }}</th>
                            <th>{{ trans('general.name') }}</th>
                            <th>{{ trans('general.slug_ar') }}</th>
                            <th>{{ trans('general.slug_en') }}</th>
                            <th>{{ trans('general.icon') }}</th>
                            <th>{{ trans('general.color') }}</th>
                            <th>{{ trans('general.caption') }}</th>
                            <th>{{ trans('general.is_admin') }}</th>
                            <th>{{ trans('general.active') }}</th>
                            <th>{{ trans('general.visible') }}</th>
                            <th>{{ trans('general.is_company') }}</th>
                            <th>{{ trans('general.actions') }}</th>
                        </tr>
                        </thead>
                        <tfoot>
                        <tr>
                            <th>{{ trans('general.id') }}</th>
                            <th>{{ trans('general.name') }}</th>
                            <th>{{ trans('general.slug_ar') }}</th>
                            <th>{{ trans('general.slug_en') }}</th>
                            <th>{{ trans('general.icon') }}</th>
                            <th>{{ trans('general.color') }}</th>
                            <th>{{ trans('general.caption') }}</th>
                            <th>{{ trans('general.is_admin') }}</th>
                            <th>{{ trans('general.active') }}</th>
                            <th>{{ trans('general.visible') }}</th>
                            <th>{{ trans('general.is_company') }}</th>
                            <th>{{ trans('general.actions') }}</th>
                        </tr>
                        </tfoot>
                        <tbody>
                        @foreach($elements as $element)
                            <tr>
                                <td>{{ $element->id }}</td>
                                <td>{{ $element->name }}</td>
                                <td>{{ $element->slug_ar }}</td>
                                <td>{{ $element->slug_en }}</td>
                                <td><i class="fa fa-fw fa-{{ $element->icon }}"></i></td>
                                <td>
                                    <span class="label"
                                          style="background-color: {{ $element->color }}; color : white">{{ $element->color }}</span>
                                </td>
                                <td>{{ $element->caption }}</td>
                                <td>
                                    <span class="label {{ activeLabel($element->is_admin) }}">{{ activeText($element->is_admin,'is_admin') }}</span>
                                </td>
                                <td>
                                    <span class="label {{ activeLabel($element->active) }}">{{ activeText($element->active) }}</span>
                                </td>
                                <td>
                                    <span class="label {{ activeLabel($element->is_visible) }}">{{ activeText($element->is_visible,'visible on app') }}</span>

                                </td>
                                <td>
                                    <span class="label {{ activeLabel($element->is_company) }}">{{ activeText($element->is_company,'has company attributes') }}</span>
                                </td>
                                <td>
                                    <div class="btn-group pull-right">
                                        <button type="button" class="btn green btn-sm btn-outline dropdown-toggle"
                                                data-toggle="dropdown"> {{ trans('general.actions') }}
                                            <i class="fa fa-angle-down"></i>
                                        </button>
                                        <ul class="dropdown-menu pull-right" role="menu">
                                            <li>
                                                <a href="{{ route('backend.admin.role.edit',$element->id) }}">
                                                    <i class="fa fa-fw fa-user"></i>{{ trans('general.edit') }}</a>
                                            </li>
                                            @if('isSuper')
                                                <li>
                                                    <a href="{{ route('backend.activate',['model' => 'role','id' => $element->id]) }}">
                                                        <i class="fa fa-fw fa-check-circle"></i> {{ trans('general.toggle_active') }}
                                                    </a>
                                                </li>
                                            @endif
                                            <li>
                                                <form method="post"
                                                      action="{{ route('backend.admin.role.destroy',$element->id) }}">
                                                    @csrf
                                                    <input type="hidden" name="_method" value="delete"/>
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
