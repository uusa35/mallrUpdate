@extends('backend.layouts.app')
@section('breadcrumbs')
    {{ Breadcrumbs::render('backend.service.index') }}
@endsection
@section('content')
    <div class="row">
        <div class="col-md-12">
            <!-- BEGIN EXAMPLE TABLE PORTLET-->
            <div class="portlet light ">
                @include('backend.partials.forms.form_title',['title' => trans('general.index_service')])
                <div class="portlet-body">
                    @include('backend.partials._admin_instructions',['title' => trans('general.services') ,'message' => trans('message.index_service')])
                    <table id="dataTable" class="table table-striped table-bordered table-hover" cellspacing="0">
                        <thead>
                        <tr>
                            <th>{{ trans('general.id') }}</th>
                            <th>{{ trans('general.sku') }}</th>
                            <th>{{ trans('general.name_ar') }}</th>
                            <th>{{ trans('general.name_en') }}</th>
                            <th>{{ trans('general.image') }}</th>
                            <th>{{ trans('general.price') }}</th>
                            <th>{{ trans('general.company') }}</th>
                            <th>{{ trans('general.active') }}</th>
                            <th>{{ trans('general.actions') }}</th>
                        </tr>
                        </thead>
                        <tfoot>
                        <tr>
                            <th>{{ trans('general.id') }}</th>
                            <th>{{ trans('general.sku') }}</th>
                            <th>{{ trans('general.name_ar') }}</th>
                            <th>{{ trans('general.name_en') }}</th>
                            <th>{{ trans('general.image') }}</th>
                            <th>{{ trans('general.price') }}</th>
                            <th>{{ trans('general.company') }}</th>
                            <th>{{ trans('general.active') }}</th>
                            <th>{{ trans('general.actions') }}</th>
                        </tr>
                        </tfoot>
                        <tbody>
                        @foreach($elements as $element)
                            <tr>
                                <td> {{$element->id}}</td>
                                <td> {{$element->sku }} </td>
                                <td> {{$element->name_ar }}
                                    @can('index','addon')
                                        @if($element->addons->isNotEmpty())
                                            <ul>
                                                <li>{{ trans('general.addons') }}</li>
                                                @foreach($element->addons as $addon)
                                                    <li>{{ $addon->name }}</li>
                                                @endforeach
                                            </ul>
                                        @endif
                                    @endcan
                                    @can('index','item')
                                        @if($element->items->isNotEmpty())
                                            <ul>
                                                <li>{{ trans('general.items') }}</li>
                                                @foreach($element->items as $item)
                                                    <li>{{ $item->name }}</li>
                                                @endforeach
                                            </ul>
                                        @endif
                                    @endif
                                </td>
                                <td> {{$element->name_en }} </td>
                                <td>
                                    <img class="img-xs" src="{{ $element->imageThumbLink }}" alt="">
                                </td>
                                <td> {{$element->price }} </td>
                                <td> {{ $element->user ? \Illuminate\Support\Str::limit($element->user->slug,20) : 'N/A'}} </td>
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
                                                    <a href="{{ route('backend.service.edit',$element->id) }}">
                                                        <i class="fa fa-fw fa-edit"></i> {{ trans('general.edit') }}</a>
                                                </li>
                                                {{--                                                 no all related to global Timings --}}
                                                {{--                                                @if(!$element->enable_global_timings)--}}
                                                {{--                                                    <li>--}}
                                                {{--                                                        <a href="{{ route('backend.timing.index',['service_id' => $element->id]) }}">--}}
                                                {{--                                                            <i class="fa fa-fw fa-edit"></i> {{ trans('general.show_timings') }}--}}
                                                {{--                                                        </a>--}}
                                                {{--                                                    </li>--}}
                                                {{--                                                    <li>--}}
                                                {{--                                                        <a href="{{ route('backend.timing.create',['service_id' => $element->id, 'user_id' => $element->user_id]) }}">--}}
                                                {{--                                                            <i class="fa fa-fw fa-edit"></i> {{ trans('general.new_timing') }}--}}
                                                {{--                                                        </a>--}}
                                                {{--                                                    </li>--}}
                                                {{--                                                @endif--}}
                                                @can('isAdminOrAbove')
                                                    <li>
                                                        <a href="{{ route('backend.slide.create',['slidable_id' => $element->id, 'slidable_type' => 'service']) }}">
                                                            <i class="fa fa-fw fa-edit"></i> {{ trans('general.new_slide') }}
                                                        </a>
                                                    </li>
                                                    @if($element->slides->isNotEmpty())
                                                        <li>
                                                            <a href="{{ route('backend.slide.index',['slidable_id' => $element->id, 'slidable_type' => 'service']) }}">
                                                                <i class="fa fa-fw fa-edit"></i> {{ trans('general.list_of_slides') }}
                                                            </a>
                                                        </li>
                                                    @endif
                                                @else
                                                    @can('slide.create')
                                                        <li>
                                                            <a href="{{ route('backend.slide.create',['slidable_id' => $element->id, 'slidable_type' => 'service']) }}">
                                                                <i class="fa fa-fw fa-edit"></i> {{ trans('general.new_slide') }}
                                                            </a>
                                                        </li>
                                                    @endcan
                                                    @if($element->slides->isNotEmpty())
                                                        @can('index','slide')
                                                            <li>
                                                                <a href="{{ route('backend.slide.index',['slidable_id' => $element->id, 'slidable_type' => 'service']) }}">
                                                                    <i class="fa fa-fw fa-edit"></i> {{ trans('general.list_of_slides') }}
                                                                </a>
                                                            </li>
                                                        @endcan
                                                    @endif
                                                @endcan
                                                <li>
                                                    <a href="{{ route('backend.activate',['model' => 'service','id' => $element->id]) }}">
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
                                                          action="{{ route('backend.service.destroy',$element->id) }}">
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
                                                    <a href="{{ route('backend.service.restore',$element->id) }}">
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
