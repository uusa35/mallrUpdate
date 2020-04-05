@extends('backend.layouts.app')

@section('breadcrumbs')
    {{ Breadcrumbs::render('backend.admin.user.index') }}
@endsection
@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="portlet light ">
                @include('backend.partials.forms.form_title',['title' => trans('general.index_user')])
                <div class="portlet-body">
                    @include('backend.partials._admin_instructions',['title' => trans('general.users') ,'message' => trans('message.index_user')])
                    <table id="dataTable" class="table table-striped table-bordered table-hover" cellspacing="0">
                        <thead>
                        <tr>
                            <th>{{ trans('general.id') }}</th>
                            <th>{{ trans('general.name') }}</th>
                            <th>{{ trans('general.slug') }}</th>
                            <th>{{ trans('general.email') }}</th>
                            <th>{{ trans('general.mobile') }}</th>
                            <th>{{ trans('general.phone') }}</th>
                            <th>{{ trans('general.address') }}</th>
                            <th>{{ trans('general.country') }}</th>
                            <th>{{ trans('general.role') }}</th>
                            <th>{{ trans('general.active') }}</th>
                            <th>{{ trans('general.actions') }}</th>
                        </tr>
                        </thead>
                        <tfoot>
                        <tr>
                            <th>{{ trans('general.id') }}</th>
                            <th>{{ trans('general.name') }}</th>
                            <th>{{ trans('general.slug') }}</th>
                            <th>{{ trans('general.email') }}</th>
                            <th>{{ trans('general.mobile') }}</th>
                            <th>{{ trans('general.phone') }}</th>
                            <th>{{ trans('general.address') }}</th>
                            <th>{{ trans('general.country') }}</th>
                            @can('isAdminOrAbove')
                                <th>{{ trans('general.role') }}</th>
                            @endcan
                            <th>{{ trans('general.active') }}</th>
                            <th>{{ trans('general.actions') }}</th>
                        </tr>
                        </tfoot>
                        <tbody>
                        @foreach($elements as $element)
                            <tr>
                                <td>{{ $element->id }}</td>
                                <td>{{ $element->name }}</td>
                                <td>{{ $element->slug }}</td>
                                <td>{{ $element->email  }}</td>
                                <td>{{ $element->mobile }}</td>
                                <td>{{ $element->phone }}</td>
                                <td>{{ $element->address }}</td>
                                {{--                                <td>{{ $element->area }}</td>--}}
                                <td>{{ $element->country ? $element->country->slug : 'N/A'}}</td>
                                <td>
                                    @if($element->role)
                                        <span class="label {{ activeLabel(!$element->active) }}">{{ activeText($element->active, $element->role->name) }}</span>
                                    @endif
                                </td>
                                <td>
                                    <span class="label {{ activeLabel($element->active) }}">{{ activeText($element->active) }}</span>
                                </td>
                                <td>
                                    <div class="btn-group">
                                        <button type="button" class="btn green btn-xs btn-outline dropdown-toggle"
                                                data-toggle="dropdown"> {{ trans('general.actions') }}
                                            <i class="fa fa-angle-down"></i>
                                        </button>
                                        <ul class="dropdown-menu pull-right" role="menu">
                                            <li>
                                                <a href="{{ route('backend.reset.password',['email' => $element->email]) }}">
                                                    <i class="fa fa-fw fa-edit"></i> Reset Password</a>
                                            </li>
                                            @if(auth()->user()->isAdmin)
                                                <li>
                                                    <a href="{{ route('backend.user.edit',$element->id) }}">
                                                        <i class="fa fa-fw fa-check-circle"></i> {{ trans('general.edit') }}
                                                    </a>
                                                </li>
                                            @endif
                                            <li>
                                                <a href="{{ route('backend.activate',['model' => 'user','id' => $element->id]) }}">
                                                    <i class="fa fa-fw fa-check-circle"></i> {{ trans('general.toggle_active') }}
                                                </a>
                                            </li>
                                            @can('isAdminOrAbove')
                                                <li>
                                                    <a href="{{ route('backend.slide.create',['slidable_id' => $element->id, 'slidable_type' => 'user']) }}">
                                                        <i class="fa fa-fw fa-edit"></i> {{ trans('general.new_slide') }}
                                                    </a>
                                                </li>
                                                @if($element->slides->isNotEmpty())
                                                    <li>
                                                        <a href="{{ route('backend.slide.index',['slidable_id' => $element->id, 'slidable_type' => 'user']) }}">
                                                            <i class="fa fa-fw fa-edit"></i> {{ trans('general.list_of_slides') }}
                                                        </a>
                                                    </li>
                                                @endif
                                            @endcan
                                            <li>
                                                <a data-toggle="modal" href="#" data-target="#basic" data-title="Delete"
                                                   data-content="Are you sure you want to delete {{ $element->name  }}?
                                                   </br> <h3 class='text-danger'>please note that all favorites / coupons shall be deleted accordingly.</h3>
                                                    " data-form_id="delete-{{ $element->id }}">
                                                    <i class="fa fa-fw fa-recycle"></i> {{ trans('general.delete') }}
                                                </a>
                                                <form method="post" id="delete-{{ $element->id }}"
                                                      action="{{ route('backend.admin.user.destroy',$element->id) }}">
                                                    @csrf
                                                    <input type="hidden" name="_method" value="delete"/>
                                                    <button type="submit" class="btn btn-del hidden">
                                                        <i class="fa fa-fw fa-times-circle"></i> {{ trans('general.delete') }}
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