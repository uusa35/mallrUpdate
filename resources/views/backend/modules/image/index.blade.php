@extends('backend.layouts.app')

@section('content')
    <div class="portlet-body">
        <table id="dataTable" class="table table-striped table-bordered table-hover" cellspacing="0"
               width="100%">
            <thead>
            <tr>
                <th>Id</th>
                {{--<th>is_main</th>--}}
                <th>image</th>
                {{--<th>description_ar</th>--}}
                {{--<th>description_en</th>--}}
                <th>gallery type</th>
                <th>gallery type id</th>
                <th>Created At</th>
                <th>Action</th>
            </tr>
            </thead>
            <tfoot>
            <tr>
                <th>Id</th>
                {{--<th>is_main</th>--}}
                <th>image</th>
                {{--<th>description_ar</th>--}}
                {{--<th>description_en</th>--}}
                <th>gallery type</th>
                <th>gallery type id</th>
                <th>Created At</th>
                <th>Action</th>
            </tr>
            </tfoot>
            <tbody>
            @foreach($elements as $element)
                <tr>
                    <td>{{ $element->id }}</td>
                    <td><img src="{{ asset('storage/uploads/images/thumbnail/'.$element->path) }}" alt=""
                             style="max-width: 100px; max-height: 100px;" class="img-responsive img-thumbnail"></td>
                    <td>
                        <span class="label label-default">{{ class_basename($element->gallery->galleryable_type) }}</span>
                    </td>
                    <td>{{ $element->gallery_id }}</td>
                    <td>{{ $element->created_at->diffForHumans() }}</td>
                    <td>
                        <div class="btn-group pull-right">
                            <button type="button" class="btn green btn-sm btn-outline dropdown-toggle"
                                    data-toggle="dropdown"> Actions
                                <i class="fa fa-angle-down"></i>
                            </button>
                            <ul class="dropdown-menu pull-right" role="menu">
                                <li>
                                    <a data-toggle="modal" href="#" data-target="#basic"
                                       data-title="Delete"
                                       data-content="Are you sure you want to delete  image ? "
                                       data-form_id="delete-{{ $element->id }}"
                                    >
                                        <i class="fa fa-fw fa-recycle"></i> delete</a>
                                    <form method="post" id="delete-{{ $element->id }}"
                                          action="{{ route('backend.image.destroy',$element->id) }}">
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