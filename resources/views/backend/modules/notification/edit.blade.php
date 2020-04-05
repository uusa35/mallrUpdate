@extends('backend.layouts.app')


@section('content')
    <div class="portlet box blue">
        @include('backend.partials.forms.form_title')
        <div class="portlet-body form">
            <form class="horizontal-form" role="form" method="POST"
                  action="{{ route('backend.notification.update', $element->id) }}" enctype="multipart/form-data">
                @csrf
                <input type="hidden" name="_method" value="put">
                <div class="form-body">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group {{ $errors->has('title') ? ' has-error' : '' }}">
                                <label for="title" class="control-label">title *</label>
                                <input id="title"
                                       type="text"
                                       class="form-control"
                                       name="title"
                                       value="{{ $element->title }}"
                                       placeholder="name in arabic"
                                       required autofocus>
                                @if ($errors->has('title'))
                                    <span class="help-block">
                                        <strong>
                                            {{ $errors->first('title') }}
                                        </strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group{{ $errors->has('description') ? ' has-error' : '' }}">
                                <label for="description" class="control-label">description English*</label>
                                <input id="description"
                                       type="text"
                                       class="form-control"
                                       name="description"
                                       value="{{ $element->description }}"
                                       placeholder="name in english"
                                       required autofocus>
                                @if ($errors->has('description'))
                                    <span class="help-block">
                                        <strong>
                                            {{ $errors->first('description') }}
                                        </strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group{{ $errors->has('type') ? ' has-error' : '' }}">
                                <label for="type" class="control-label">type English*</label>
                                <input id="type"
                                       type="text"
                                       class="form-control"
                                       name="type"
                                       value="{{ $element->type }}"
                                       placeholder="name in english"
                                       required autofocus>
                                @if ($errors->has('type'))
                                    <span class="help-block">
                                        <strong>
                                            {{ $errors->first('type') }}
                                        </strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="form_control_1">Main Image*</label>
                                <input type="file" class="form-control" name="image" placeholder="image">
                                <div class="help-block text-left">
                                    W * H - Best fit ['500', '500'] pixels
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="form_control_1">Path Image*</label>
                                <input type="file" class="form-control" name="path" placeholder="path">
                                <div class="help-block text-left">
                                    only pdf
                                </div>
                            </div>
                        </div>
                    </div>

                @include('backend.partials.forms._btn-group')
            </form>
        </div>
    </div>
@endsection
