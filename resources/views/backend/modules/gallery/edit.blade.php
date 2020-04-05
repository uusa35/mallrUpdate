@extends('backend.layouts.app')

@section('breadcrumbs')
    {{ Breadcrumbs::render('backend.gallery.edit', $element) }}
@endsection

@section('content')
    <div class="portlet box blue">
        @include('backend.partials.forms.form_title')
        <div class="portlet-body form">
            <form class="horizontal-form" role="form" method="POST"
                  action="{{ route('backend.gallery.update', $element->id) }}" enctype="multipart/form-data">
                @csrf
                <div class="form-body">
                    <input type="hidden" name="_method" value="put">
                    <input type="hidden" name="galleryable_id" value="{{ $element->galleryable_id }}"/>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group {{ $errors->has('name_ar') ? ' has-error' : '' }}">
                                <label for="name_ar" class="control-label">Name Arabic*</label>
                                <input id="name_ar"
                                       type="text"
                                       class="form-control"
                                       name="name_ar"
                                       value="{{ $element->name_ar }}"
                                       placeholder="name in arabic"
                                       required autofocus>
                                @if ($errors->has('name_ar'))
                                    <span class="help-block">
                                        <strong>
                                            {{ $errors->first('name_ar') }}
                                        </strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group {{ $errors->has('name_en') ? ' has-error' : '' }}">
                                <label for="name_en" class="control-label">Name Arabic*</label>
                                <input id="name_en"
                                       type="text"
                                       class="form-control"
                                       name="name_en"
                                       value="{{ $element->name_en }}"
                                       placeholder="name in arabic"
                                       required autofocus>
                                @if ($errors->has('name_en'))
                                    <span class="help-block">
                                        <strong>
                                            {{ $errors->first('name_en') }}
                                        </strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="col-lg-6">
                            <div class="form-group">
                                <label for="file"
                                       class="control-label col-sm-2">cover image*</label>
                                <div class="col-sm-4">
                                    <input class="form-control tooltip-message" name="cover"
                                           placeholder="main image"
                                           type="file"
                                    />
                                    <div class="help-block text-left">
                                        W * H - Best fit ['1080', '1440'] pixels
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <img class="img-responsive img-sm"
                                         src="{{ asset('storage/uploads/images/thumbnail/'.$element->cover) }}" alt="">
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label for="file"
                                       class="control-label col-sm-2">more images</label>
                                <div class="col-sm-10">
                                    <input class="form-control tooltip-message" name="images[]"
                                           placeholder="images" type="file" multiple/>
                                    <div class="help-block text-left">
                                        W * H - Best fit ['1080', '1440'] pixels
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label for="description_ar" class="control-label">description arabic</label>
                                <textarea type="text" class="form-control" id="description_ar" name="description_ar"
                                          aria-multiline="true"
                                          maxlength="500">{{ $element->description_ar }}</textarea>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label for="description_en" class="control-label">description english</label>
                                <textarea type="text" class="form-control" id="description_en" name="description_en"
                                          aria-multiline="true"
                                          maxlength="500">{{ $element->description_en }}</textarea>
                            </div>
                        </div>
                    </div>
                </div>
                @include('backend.partials.forms._btn-group')
            </form>
        </div>
        <div class="portlet box blue">
            <div class="portlet-body">
                <div class="row">
                    <div class="col-lg-12">
                        @foreach($element->images->chunk(4) as $set)
                            @foreach($set as $i)
                                <div class="col-sm-3">
                                    <div class="panel panel-default">
                                        <div class="panel-body">
                                            <img class="img-responsive img-thumbnail" style="max-height: 200px;"
                                                 src="{{ asset('storage/uploads/images/thumbnail/'.$i->path) }}" alt="">
                                            <div class="btn-group pull-right">
                                                <button type="button" class="btn green btn-sm btn-outline dropdown-toggle"
                                                        data-toggle="dropdown"> Actions
                                                    <i class="fa fa-angle-down"></i>
                                                </button>
                                                <ul class="dropdown-menu pull-right" role="menu">
                                                    <li>
                                                        <a href="{{ route('backend.image.edit',$i->id) }}" target="_blank">
                                                            <i class="fa fa-fw fa-user"></i>edit image</a>
                                                    </li>
                                                    <li>
                                                        <a data-toggle="modal" href="#" data-target="#basic"
                                                           data-title="Delete"
                                                           data-content="Are you sure you want to delete image ? "
                                                           data-form_id="delete-{{ $element->id }}"
                                                        >
                                                            <i class="fa fa-fw fa-recycle"></i> delete</a>
                                                        <form method="post" id="delete-{{ $element->id }}"
                                                              action="{{ route('backend.image.destroy',$i->id) }}">
                                                            @csrf
                                                            <input type="hidden" name="_method" value="delete"/>
                                                            <button type="submit" class="btn btn-del hidden">
                                                                <i class="fa fa-fw fa-times-circle"></i> delete image
                                                            </button>
                                                        </form>
                                                    </li>
                                                </ul>
                                            </div>
                                            <ul style="padding: 20px;">
                                                <li>
                                                    order : {{ $i->order }} </br>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection