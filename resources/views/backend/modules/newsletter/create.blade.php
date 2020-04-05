@extends('backend.layouts.app')
@section('breadcrumbs')
{{ Breadcrumbs::render('backend.admin.newsletter.create') }}
@endsection

@section('content')
<div class="portlet box blue">
    @include('backend.partials.forms.form_title')
    <div class="portlet-body">
        @include('backend.partials._admin_instructions',['title' => trans('general.newsletters') ,'message' => trans('message.admin_newsletter_message')])
        <div class="portlet-body form">
            <form class="horizontal-form" role="form" method="POST" action="{{ route('backend.admin.newsletter.store') }}" enctype="multipart/form-data">
                @csrf
                <div class="form-body">
                    <h3 class="form-section">{{ trans('general.create_newsletter') }}</h3>
                    <div class="portlet box blue ">
                        <div class="portlet-title">
                            <div class="caption">
                                <i class="fa fa-gift"></i> {{ trans('general.newsletter_main_details') }}
                            </div>
                        </div>
                        <div class="portlet-body form">
                            <div class="form-body">
                                <div class="row">
                                    <div class="col-sm-5">
                                        <label for="name" class="control-label">{{ trans('general.name') }}</label>
                                        <input type="text" class="form-control" name="name" placeholder="{{ trans('general.name') }}" required="">
                                    </div>
                                    <div class="col-sm-5">
                                        <label for="email" class="control-label">{{ trans('general.email') }}</label>
                                        <input type="text" class="form-control" name="email" placeholder="{{ trans('general.email') }}" required="">
                                    </div>
                                    <div class="col-sm-2">
                                        <label for="menu" class="control-label">{{ trans('general.active') }}</label><br>
                                        <input type="radio" name="active" value="1" checked> {{ trans('general.active') }}<br>
                                        <input type="radio" name="active" value="0"> {{ trans('general.not_active') }}<br>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>

                </div>
                @include('backend.partials.forms._btn-group')
            </form>
        </div>
    </div>
    @endsection