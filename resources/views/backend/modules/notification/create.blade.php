@extends('backend.layouts.app')
@section('breadcrumbs')
    {{ Breadcrumbs::render('backend.admin.notification.create') }}
@endsection

@section('content')
    <div class="portlet box blue">
        @include('backend.partials.forms.form_title',['title' => trans('general.new_notification')])
        <div class="portlet-body">
            @include('backend.partials._admin_instructions',['title' => trans('general.notifications') ,'message' => trans('message.new_notification')])
            <div class="portlet-body form">
                <form class="horizontal-form" role="form" method="POST"
                      action="{{ route('backend.admin.notification.store') }}" enctype="multipart/form-data">
                    @csrf
                    <div class="form-body">
                        <h3 class="form-section">{{ trans('general.new_notification') }}</h3>
                        <div class="portlet box blue ">
                            <div class="portlet-title">
                                <div class="caption">
                                    <i class="fa fa-gift"></i> {{ trans('general.main_details') }}
                                </div>
                            </div>
                            <div class="portlet-body form">
                                <div class="form-body">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group {{ $errors->has('title') ? ' has-error' : '' }}">
                                                <label for="title" class="control-label">{{ trans('general.title') }}
                                                    *</label>
                                                <textarea type="text"
                                                          class="form-control tooltips tinymce-notifications "
                                                          data-container="body" data-placement="top"
                                                          data-original-title="{{ trans('message.title') }}"
                                                          id="title" name="title" aria-multiline="true"
                                                          maxlength="80"></textarea>
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
                                                <label for="description"
                                                       class="control-label">{{ trans('general.description') }}*</label>
                                                <textarea type="text"
                                                          class="form-control tooltips tinymce-notifications "
                                                          data-container="body" data-placement="top"
                                                          data-original-title="{{ trans('message.description') }}"
                                                          id="description" name="description" aria-multiline="true"
                                                          maxlength="200"></textarea>
                                                @if ($errors->has('description'))
                                                    <span class="help-block">
                                                <strong>
                                                    {{ $errors->first('description') }}
                                                </strong>
                                            </span>
                                                @endif
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="single"
                                                       class="control-label">{{ trans('general.type') }}</label>
                                                <select id="notificationable_type" class="form-control tooltips select2"
                                                        data-container="body" data-placement="top"
                                                        data-original-title="{{ trans('message.type_id') }}"
                                                        name="notificationable_type" required>
                                                    <option value="0">{{ trans('general.choose_type') }}</option>
                                                    <option value="company">{{ trans('general.company') }}</option>
                                                    @if(env('ABATI'))
                                                        <option value="designer">{{ trans('general.designer') }}</option>
                                                    @endif
                                                    @if(env('MALLR'))
                                                        <option value="shopper">{{ trans('general.shopper') }}</option>
                                                    @endif
                                                    @can('index','classified')
                                                        <option value="classified">{{ trans('general.classified') }}</option>
                                                    @endcan
                                                    @can('index','product')
                                                        <option value="product">{{ trans('general.product') }}</option>
                                                    @endcan
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="single"
                                                       class="control-label">{{ trans('general.user') }}</label>
                                                <select id="user_id" class="form-control tooltips select2"
                                                        data-container="body" data-placement="top"
                                                        data-original-title="{{ trans('message.choose_user') }}"
                                                        name="user_id">
                                                    <option value="0">{{ trans('general.choose_user') }}</option>
                                                    @foreach($users as $user)
                                                        <option value="{{ $user->id }}">{{ $user->name }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                        @can('index','product')
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="single"
                                                       class="control-label">{{ trans('general.product') }}</label>
                                                <select id="product_id" class="form-control tooltips select2"
                                                        data-container="body" data-placement="top"
                                                        data-original-title="{{ trans('message.choose_product') }}"
                                                        name="product_id">
                                                    <option value="null">{{ trans('general.choose_product') }}</option>
                                                    @foreach($products as $element)
                                                        <option value="{{ $element->id }}">{{ $element->name }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                        @endcan
                                        @can('index','classified')
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="single"
                                                       class="control-label">{{ trans('general.classified') }}</label>
                                                <select id="product_id" class="form-control tooltips select2"
                                                        data-container="body" data-placement="top"
                                                        data-original-title="{{ trans('message.choose_classified') }}"
                                                        name="classified_id">
                                                    <option value="null">{{ trans('general.choose_classified') }}</option>
                                                    @foreach($classifieds as $element)
                                                        <option value="{{ $element->id }}">{{ $element->name }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                        @endcan

                                        {{--                                        <div class="col-md-4">--}}
                                        {{--                                            <div class="form-group">--}}
                                        {{--                                                <label for="form_control_1">{{ trans('general.image_path') }}</label>--}}
                                        {{--                                                <input type="file" class="form-control" name="path" placeholder="path">--}}
                                        {{--                                                <div class="help-block text-left">--}}
                                        {{--                                                    only pdf--}}
                                        {{--                                                </div>--}}
                                        {{--                                            </div>--}}
                                        {{--                                        </div>--}}
                                        {{--                                        <div class="col-md-4">--}}
                                        {{--                                            <div class="form-group">--}}
                                        {{--                                                <label for="form_control_1">{{ trans('general.url') }}</label>--}}
                                        {{--                                                <input type="url" class="form-control disabled" name="url"--}}
                                        {{--                                                       placeholder="{{ trans('general.url') }}" value="{{ env('APP_DEEP_LINK') }}">--}}
                                        {{--                                                <div class="help-block text-left">--}}

                                        {{--                                                </div>--}}
                                        {{--                                            </div>--}}
                                        {{--                                        </div>--}}
                                        {{--                                        <div class="col-md-4">--}}
                                        {{--                                            <div class="form-group">--}}
                                        {{--                                                <label for="form_control_1">{{ trans('general.main_image') }}</label>--}}
                                        {{--                                                <input type="file" class="form-control" name="image"--}}
                                        {{--                                                       placeholder="image">--}}
                                        {{--                                                <div class="help-block text-left">--}}
                                        {{--                                                    {{ trans('message.best_fit',['width' => '500 px', 'height' => '500px']) }}--}}
                                        {{--                                                </div>--}}
                                        {{--                                            </div>--}}
                                        {{--                                        </div>--}}
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
