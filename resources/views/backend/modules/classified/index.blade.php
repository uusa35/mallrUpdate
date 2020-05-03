@extends('backend.layouts.app')
@section('breadcrumbs')
    {{ Breadcrumbs::render('backend.classified.index') }}
@endsection
@section('content')
    <div class="row">
        <div class="col-md-12">
            <!-- BEGIN EXAMPLE TABLE PORTLET-->
            <div class="portlet light ">
                @include('backend.partials.forms.form_title',['title' => trans('general.index_classified')])
                <div class="portlet-body">
                    @include('backend.partials._admin_instructions',['title' => trans('general.classifieds') ,'message' => trans('message.index_classified')])
                    <table id="dataTable" class="table table-striped table-bordered table-hover" cellspacing="0">
                        <thead>
                        <tr>
                            <th>{{ trans('general.id') }}</th>
                            <th>{{ trans('general.name_ar') }}</th>
                            <th>{{ trans('general.name_en') }}</th>
                            <th>{{ trans('general.image') }}</th>
                            <th>{{ trans('general.price') }}</th>
                            <th>{{ trans('general.company') }}</th>
                            <th>{{ trans('general.properties') }}</th>
                            <th>{{ trans('general.active') }}</th>
                            <th>{{ trans('general.actions') }}</th>
                        </tr>
                        </thead>
                        <tfoot>
                        <tr>
                            <th>{{ trans('general.id') }}</th>
                            <th>{{ trans('general.name_ar') }}</th>
                            <th>{{ trans('general.name_en') }}</th>
                            <th>{{ trans('general.image') }}</th>
                            <th>{{ trans('general.price') }}</th>
                            <th>{{ trans('general.company') }}</th>
                            <th>{{ trans('general.properties') }}</th>
                            <th>{{ trans('general.active') }}</th>
                            <th>{{ trans('general.actions') }}</th>
                        </tr>
                        </tfoot>
                        <tbody>
                        @foreach($elements as $element)
                            <tr>
                                <td> {{$element->id}}</td>
                                <td> {{$element->name_ar }} </td>
                                <td> {{$element->name_en }} </td>
                                <td>
                                    <img class="img-xs" src="{{ $element->imageThumbLink }}" alt="">
                                </td>
                                <td> {{$element->price }} </td>
                                <td> {{ $element->user ? str_limit($element->user->slug,20) : null}} </td>
                                <td>
                                    @if($element->properties->isNotEmpty())
                                        <ul>
                                            @foreach($element->properties as $p)
                                                <li>{{ $p->name }} - {{ trans('general.value') }} : {{ $p->value }}</li>
                                            @endforeach
                                        </ul>
                                    @else
                                        <span class="label label-danger">N/A</span>
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
                                        @if(!$element->trashed())
                                            <ul class="dropdown-menu pull-right" role="menu">
                                                <li>
                                                    <a href="{{ route('backend.classified.edit',$element->id) }}">
                                                        <i class="fa fa-fw fa-edit"></i> {{ trans('general.edit') }}</a>
                                                </li>
                                                @if($element->category && $element->category->categoryGroups->isNotEmpty())
                                                    <li>
                                                        <a href="{{ route('backend.property.attach',['id' => $element->id]) }}">
                                                            <i class="fa fa-fw fa-edit"></i> {{ trans('general.attach_property') }}
                                                        </a>
                                                    </li>
                                                    <li>
                                                        <a href="{{ route('backend.property.detach',['id' => $element->id]) }}">
                                                            <i class="fa fa-fw fa-edit"></i> {{ trans('general.detach_property') }}
                                                        </a>
                                                    </li>
                                                @endif
                                                @can('isAdminOrAbove')
                                                    <li>
                                                        <a href="{{ route('backend.slide.create',['slidable_id' => $element->id, 'slidable_type' => 'classified']) }}">
                                                            <i class="fa fa-fw fa-edit"></i> {{ trans('general.new_slide') }}
                                                        </a>
                                                    </li>
                                                    @if($element->slides->isNotEmpty())
                                                        <li>
                                                            <a href="{{ route('backend.slide.index',['slidable_id' => $element->id, 'slidable_type' => 'classified']) }}">
                                                                <i class="fa fa-fw fa-edit"></i> {{ trans('general.list_of_slides') }}
                                                            </a>
                                                        </li>
                                                    @endif
                                                @else
                                                    @can('slide.create')
                                                        <li>
                                                            <a href="{{ route('backend.slide.create',['slidable_id' => $element->id, 'slidable_type' => 'classified']) }}">
                                                                <i class="fa fa-fw fa-edit"></i> {{ trans('general.new_slide') }}
                                                            </a>
                                                        </li>
                                                    @endcan
                                                    @if($element->slides->isNotEmpty())
                                                        @can('index','slide')
                                                            <li>
                                                                <a href="{{ route('backend.slide.index',['slidable_id' => $element->id, 'slidable_type' => 'classified']) }}">
                                                                    <i class="fa fa-fw fa-edit"></i> {{ trans('general.list_of_slides') }}
                                                                </a>
                                                            </li>
                                                        @endcan
                                                    @endif
                                                @endcan
                                                <li>
                                                    <a href="{{ route('backend.activate',['model' => 'classified','id' => $element->id]) }}">
                                                        <i class="fa fa-fw fa-check-circle"></i> {{ trans('general.toggle_active') }}
                                                    </a>
                                                </li>
                                                <li>
                                                    <a data-toggle="modal" href="#" data-target="#basic"
                                                       data-title="Delete"
                                                       data-content="Are you sure you want to delete day {{ $element->name }}? "
                                                       data-form_id="delete-{{ $element->id }}">
                                                        <i class="fa fa-fw fa-recycle"></i> {{ trans('general.delete') }}
                                                    </a>
                                                    <form method="post" id="delete-{{ $element->id }}"
                                                          action="{{ route('backend.classified.destroy',$element->id) }}">
                                                        @csrf
                                                        <input type="hidden" name="_method" value="delete"/>
                                                        <button type="submit" class="btn btn-del hidden">
                                                            <i class="fa fa-fw fa-times-circle"></i> {{ trans('general.delete') }}
                                                        </button>
                                                    </form>
                                                </li>
                                            </ul>
                                        @else
                                            <ul class="dropdown-menu pull-right" role="menu">
                                                <li>
                                                    <a href="{{ route('backend.classified.restore',$element->id) }}">
                                                        <i class="fa fa-fw fa-edit"></i> {{ trans('general.restore') }}
                                                    </a>
                                                </li>
                                            </ul>
                                        @endif
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
