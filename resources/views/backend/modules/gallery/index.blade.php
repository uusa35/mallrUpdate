@extends('backend.layouts.app')

@section('breadcrumbs')
    {{ Breadcrumbs::render('backend.gallery.index') }}
@endsection

@section('content')
    <div class="portlet-body">
        <table id="dataTable" class="table table-striped table-bordered table-hover" cellspacing="0"
               width="100%">
            <thead>
            <tr>
                <th>Id</th>
                <th>name_ar</th>
                <th>name_en</th>
                <th>modal_id</th>
                <th>modal_type</th>
                <th>Model Name</th>
                <th>cover</th>
                <th>active</th>
                <th>Action</th>
            </tr>
            </thead>
            <tfoot>
            <tr>
                <th>Id</th>
                <th>name_ar</th>
                <th>name_en</th>
                <th>modal_id</th>
                <th>modal_type</th>
                <th>Model Name</th>
                <th>cover</th>
                <th>active</th>
                <th>Action</th>
            </tr>
            </tfoot>
            <tbody>
            @foreach($elements as $element)
                <tr>
                    <td>{{ $element->id }}</td>
                    <td>{{ $element->name_ar }}</td>
                    <td>{{ $element->name_en }}</td>
                    <td>{{ $element->galleryable_id}}</td>
                    <td>
                        <span class="label label-success">{{ class_basename($element->galleryable_type) }}</span>
                    </td>
                    <td>
                        {{ $element->galleryable_type }}
                    </td>
                    <td>
                        <img class="img-sm"
                             src="{{ asset('storage/uploads/images/thumbnail/'.$element->cover) }}" alt="">
                    </td>
                    <td>
                        <span class="label {{ activeLabel($element->active) }}">{{ activeText($element->active) }}</span>
                    </td>
                    <td>
                        <div class="btn-group pull-right">
                            <button type="button" class="btn green btn-sm btn-outline dropdown-toggle"
                                    data-toggle="dropdown"> Actions
                                <i class="fa fa-angle-down"></i>
                            </button>
                            <ul class="dropdown-menu pull-right" role="menu">
                                <li>
                                    <a href="{{ route('backend.activate',['model' => 'gallery', 'id' => $element->id]) }}">
                                        <i class="fa fa-fw fa-user"></i>toggle activation</a>
                                </li>
                                <li>
                                    <a data-toggle="modal" href="#" data-target="#basic"
                                       data-title="Delete"
                                       data-content="Are you sure you want to delete {{ $element->name  }}? "
                                       data-form_id="delete-{{ $element->id }}"
                                    >
                                        <i class="fa fa-fw fa-recycle"></i> delete</a>
                                    <form method="post" id="delete-{{ $element->id }}"
                                          action="{{ route('backend.gallery.destroy',$element->id) }}">
                                        @csrf
                                        <input type="hidden" name="_method" value="delete"/>
                                        <button type="submit" class="btn btn-del hidden">
                                            <i class="fa fa-fw fa-times-circle"></i> delete
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
@endsection