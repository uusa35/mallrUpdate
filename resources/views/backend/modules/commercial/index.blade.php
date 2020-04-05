@extends('backend.layouts.app')

@section('breadcrumbs')
    {{ Breadcrumbs::render('backend.admin.commercial.index') }}
@endsection
@section('content')
    <div class="row">
        <div class="col-md-12">
            <!-- BEGIN EXAMPLE TABLE PORTLET-->
            <div class="portlet light ">
                @include('backend.partials.forms.form_title',['title' => trans('general.new_commercial')])
                <div class="portlet-body">
                    <div class="portlet-body">
                        @include('backend.partials._admin_instructions',['title' => trans('general.commercials') ,'message' => trans('message.index_commercial')])
                        <table id="dataTable" class="table table-striped table-bordered table-hover" cellspacing="0"
                               width="100%">
                            <thead>
                            <tr>
                                <th>{{ trans('general.id') }}</th>
                                <th>{{ trans('general.splash') }}</th>
                                <th>{{ trans('general.show_on_home') }}</th>
                                <th>{{ trans('general.show_on_category') }}</th>
                                <th>{{ trans('general.show_on_company') }}</th>
                                <th>{{ trans('general.show_on_individual') }}</th>
                                <th>{{ trans('general.image') }}</th>
                                <th>{{ trans('general.active') }}</th>
                                <th>{{ trans('general.created_at') }}</th>
                                <th>{{ trans('general.actions') }}</th>
                            </tr>
                            </thead>
                            <tfoot>
                            <tr>
                                <th>{{ trans('general.id') }}</th>
                                <th>{{ trans('general.splash') }}</th>
                                <th>{{ trans('general.show_on_home') }}</th>
                                <th>{{ trans('general.show_on_category') }}</th>
                                <th>{{ trans('general.show_on_company') }}</th>
                                <th>{{ trans('general.show_on_individual') }}</th>
                                <th>{{ trans('general.image') }}</th>
                                <th>{{ trans('general.active') }}</th>
                                <th>{{ trans('general.created_at') }}</th>
                                <th>{{ trans('general.actions') }}</th>
                            </tr>
                            </tfoot>
                            <tbody>
                            @foreach($commercials as $element)
                                <tr>
                                    <td>{{ $element->id }}</td>
                                    <td>
                                        <span class="label {{ activeLabel($element->is_splash) }}">{{ activeText($element->is_splash,'splash') }}</span>
                                    </td>
                                    <td>
                                        <span class="label {{ activeLabel($element->on_home) }}">{{ activeText($element->on_home,'home') }}</span>
                                    </td>
                                    <td>
                                        <span class="label {{ activeLabel($element->is_category) }}">{{ activeText($element->is_category,'category list') }}</span>
                                    </td>
                                    <td>
                                        <span class="label {{ activeLabel($element->is_company) }}">{{ activeText($element->is_company,'company') }}</span>
                                    </td>
                                    <td>
                                        <span class="label {{ activeLabel($element->is_individual) }}">{{ activeText($element->is_individual,'individual') }}</span>
                                    </td>
                                    <td>
                                        <img src="{{ $element->imageThumbLink }}" alt="" class="img-responsive img-sm">
                                    </td>
                                    <td>
                                        <span class="label {{ activeLabel($element->active) }}">{{ activeText($element->active) }}</span>
                                    </td>
                                    <td>{{ $element->created_at->diffForHumans() }}</td>
                                    <td>
                                        <div class="btn-group pull-right">
                                            <button type="button" class="btn green btn-sm btn-outline dropdown-toggle"
                                                    data-toggle="dropdown"> {{ trans('general.actions') }}
                                                <i class="fa fa-angle-down"></i>
                                            </button>
                                            <ul class="dropdown-menu pull-right" role="menu">
                                                <li>
                                                    <a href="{{ route('backend.admin.commercial.edit',$element->id) }}">
                                                        <i class="fa fa-fw fa-user"></i>{{ trans('general.edit') }}</a>
                                                </li>
                                                <li>
                                                    <a href="{{ route('backend.activate',['model' => 'commercial','id' => $element->id]) }}">
                                                        <i class="fa fa-fw fa-check-circle"></i> {{ trans('general.toggle_active') }}
                                                    </a>
                                                </li>
                                                <li>
                                                    <form method="post"
                                                          action="{{ route('backend.admin.commercial.destroy',$element->id) }}">
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
    </div>
@endsection