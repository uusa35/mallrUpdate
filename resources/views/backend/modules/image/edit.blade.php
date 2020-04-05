@extends('backend.layouts.app')

@section('breadcrumbs')
    {{ Breadcrumbs::render('backend.image.edit',$element) }}
@endsection

@section('content')
    <div class="portlet box blue">
        @include('backend.partials.forms.form_title')
        <div class="portlet-body form">
            <form class="horizontal-form" role="form" method="POST"
                  action="{{ route('backend.image.update', $element->id) }}" enctype="multipart/form-data">
                @csrf
                <input type="hidden" name="_method" value="put">
                <div class="form-body">
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group {{ $errors->has('caption_ar') ? ' has-error' : '' }}">
                                    <label for="caption_ar" class="control-label">Name Arabic*</label>
                                    <input id="caption_ar"
                                           type="text"
                                           class="form-control"
                                           name="caption_ar"
                                           value="{{ $element->caption_ar }}"
                                           placeholder="name in arabic"
                                           required autofocus>
                                    @if ($errors->has('caption_ar'))
                                        <span class="help-block">
                                        <strong>
                                            {{ $errors->first('caption_ar') }}
                                        </strong>
                                    </span>
                                    @endif
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group{{ $errors->has('caption_en') ? ' has-error' : '' }}">
                                    <label for="caption_en" class="control-label">Name English*</label>
                                    <input id="caption_en"
                                           type="text"
                                           class="form-control"
                                           name="caption_en"
                                           value="{{ $element->caption_en }}"
                                           placeholder="name in english"
                                           required autofocus>
                                    @if ($errors->has('caption_en'))
                                        <span class="help-block">
                                        <strong>
                                            {{ $errors->first('caption_en') }}
                                        </strong>
                                    </span>
                                    @endif
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group{{ $errors->has('order') ? ' has-error' : '' }}">
                                    <label for="order" class="control-label">Order*</label>
                                    <input id="order"
                                           type="number"
                                           class="form-control"
                                           name="order"
                                           maxlength="1"
                                           value="{{ $element->order }}"
                                           placeholder="name in english"
                                           required autofocus>
                                    @if ($errors->has('order'))
                                        <span class="help-block">
                                        <strong>
                                            {{ $errors->first('order') }}
                                        </strong>
                                    </span>
                                    @endif
                                </div>
                            </div>
                        </div>
                    @include('backend.partials.forms._btn-group')
                </div>
            </form>
        </div>
    </div>
@endsection