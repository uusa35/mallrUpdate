@extends('backend.layouts.app')

{{--@section('breadcrumbs')--}}
{{--{{ Breadcrumbs::render('backend.gallery.create') }}--}}
{{--@endsection--}}


@section('content')
    <div class="portlet box blue">
        @include('backend.partials.forms.form_title')
        <div class="portlet-body form">
            <form class="horizontal-form" role="form" method="POST"
                  action="{{ route('backend.gallery.store') }}"
                  enctype="multipart/form-data">
                @csrf
                <input type="hidden" name="type" value="{{ request()->type }}">
                <input type="hidden" name="element_id" value="{{ request()->element_id }}">
                <h3 class="form-section">Create Gallery</h3>
                @if(request('type') === 'product')
                    @include('____frontend.partials._product_steps')
                @endif
                <div class="form-body">
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label class="col-md-2 control-label">Name Ar</label>
                                <div class="col-md-10">
                                    <input type="text" name="name_ar" value="{{ old('name_ar')}}" class="form-control"
                                           placeholder="Enter text">
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label class="col-md-2 control-label">Name En</label>
                                <div class="col-md-10">
                                    <input type="text" name="name_en" value="{{ old('name_en') }}" class="form-control"
                                           placeholder="Enter text">
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label for="file"
                                       class="control-label col-sm-2">cover image*</label>
                                <div class="col-sm-10">
                                    <input class="form-control tooltip-message" name="cover"
                                           placeholder="main image"
                                           type="file"
                                           required
                                    />
                                    <div class="help-block text-left">
                                        W * H - Best fit ['1080', '1440'] pixels
                                    </div>
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
                    </div>

                    <div class="row">
                        <div class="col-lg-5 col-lg-offset-1">
                            <div class="form-group">
                                <label for="description_ar"
                                       class="control-label">description_ar</label>
                                <textarea type="text" class="form-control" id="description_ar" name="description_ar"
                                          aria-multiline="true" maxlength="500"></textarea>
                            </div>
                        </div>

                        <div class="col-lg-5 col-lg-offset-1">
                            <div class="form-group">
                                <label for="description" class="control-label">description english</label>
                                <textarea type="text" class="form-control" id="description_en" name="description_en"
                                          aria-multiline="true" maxlength="500"></textarea>
                            </div>
                        </div>
                    </div>
                    @include('backend.partials.forms._btn-group')
                </div>
            </form>
        </div>
    </div>
@endsection