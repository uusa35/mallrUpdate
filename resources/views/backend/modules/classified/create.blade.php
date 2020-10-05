@extends('backend.layouts.app')

@section('breadcrumbs')
    {{ Breadcrumbs::render('backend.classified.create') }}
@endsection

@section('content')
    <div class="portlet box blue">
        @include('backend.partials.forms.form_title',['title' => trans('general.new_classified')])
        <div class="portlet-body">
            @include('backend.partials._admin_instructions',['title' => trans('general.classified') ,'message' =>
            trans('message.new_classified')])
            <div class="portlet-body form">
                <form class="horizontal-form" role="form" method="POST" action="{{ route('backend.classified.store') }}"
                      enctype="multipart/form-data">
                    @csrf
                    <div class="form-body">
                        <h3 class="form-section">{{ trans('general.new_classified') }}</h3>
                        <div class="portlet box blue ">
                            <div class="portlet-title">
                                <div class="caption">
                                    <i class="fa fa-gift"></i> {{ trans('general.main_details') }}
                                </div>
                            </div>
                            <div class="portlet-body form">
                                <div class="form-body">
                                    <div class="mt-element-step">
                                        <div class="row step-default">
                                            <div class="col-md-6 bg-success mt-step-col {{ Route::currentRouteName() === 'backend.classified.create' ? 'active' : null  }}">
                                                <div class="mt-step-number bg-white font-grey">1</div>
                                                <div class="mt-step-title uppercase font-grey-cascade">
                                                    {{ trans('general.new_classified') }}</div>
                                                <div class="mt-step-content font-grey-cascade">
                                                    {{ trans('message.new_classified') }}</div>
                                            </div>
                                            <div class="col-md-6 bg-grey mt-step-col {{ Route::currentRouteName() === 'backend.property.create' ? 'active' : null  }}">
                                                <div class="mt-step-number bg-white font-grey">2</div>
                                                <div class="mt-step-title uppercase font-grey-cascade">
                                                    {{ trans('general.add_property') }}</div>
                                                <div class="mt-step-content font-grey-cascade">{{ trans('message.add_property') }}
                                                </div>
                                            </div>
                                            {{--<div class="col-md-4 bg-grey mt-step-col {{ Route::currentRouteName() === 'backend.gallery.create' ? 'active' : null  }}">--}}
                                            {{--<div class="mt-step-number bg-white font-grey">3</div>--}}
                                            {{--<div class="mt-step-title uppercase font-grey-cascade">{{ trans('general.create_gallery') }}
                                        </div>--}}
                                            {{--<div class="mt-step-content font-grey-cascade">{{ trans('general.create_gallery_for_product') }}
                                        </div>--}}
                                            {{--</div>--}}
                                        </div>
                                        <br/>
                                        <br/>
                                    </div>
                                    <br>
                                    <div class="row">
                                        <div class="col-md-4">
                                            <div class="form-group {{ $errors->has('name_ar') ? ' has-error' : '' }}">
                                                <label for="name_ar"
                                                       class="control-label">{{ trans('general.name_ar') }}
                                                    *</label>
                                                <input id="name_ar" type="text" class="form-control tooltips"
                                                       data-container="body" data-placement="top"
                                                       data-original-title="{{ trans('message.name_ar') }}"
                                                       name="name_ar" value="{{ old('name_ar') }}"
                                                       placeholder="{{ trans('general.name_ar') }}" required autofocus>
                                                @if ($errors->has('name_ar'))
                                                    <span class="help-block">
                                                <strong>
                                                    {{ $errors->first('name_ar') }}
                                                </strong>
                                            </span>
                                                @endif
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group {{ $errors->has('name_en') ? ' has-error' : '' }}">
                                                <label for="name_en"
                                                       class="control-label">{{ trans('general.name_en') }}
                                                    *</label>
                                                <input id="name_en" type="text" class="form-control tooltips"
                                                       data-container="body" data-placement="top"
                                                       data-original-title="{{ trans('message.name_en') }}"
                                                       name="name_en" value="{{ old('name_en') }}"
                                                       placeholder="{{ trans('general.name_en') }}" required autofocus>
                                                @if ($errors->has('name_en'))
                                                    <span class="help-block">
                                                <strong>
                                                    {{ $errors->first('name_en') }}
                                                </strong>
                                            </span>
                                                @endif
                                            </div>
                                        </div>

                                        <div class="col-md-4">
                                            <div class="form-group{{ $errors->has('price') ? ' has-error' : '' }}">
                                                <label for="price" class="control-label">{{ trans('general.price') }}
                                                    *</label>
                                                <input id="price" type="text" class="form-control tooltips"
                                                       data-container="body" data-placement="top"
                                                       data-original-title="{{ trans('message.price') }}" name="price"
                                                       value="{{ old('price') }}"
                                                       placeholder="{{ trans('general.price') }}" required autofocus>
                                                @if ($errors->has('price'))
                                                    <span class="help-block">
                                                <strong>
                                                    {{ $errors->first('price') }}
                                                </strong>
                                            </span>
                                                @endif
                                            </div>
                                        </div>

                                        <div class="col-md-4">
                                            <div class="form-group{{ $errors->has('mobile') ? ' has-error' : '' }}">
                                                <label for="mobile" class="control-label">{{ trans('general.mobile') }}
                                                    *</label>
                                                <input id="mobile" type="text" class="form-control tooltips"
                                                       data-container="body" data-placement="top"
                                                       data-original-title="{{ trans('message.mobile') }}" name="mobile"
                                                       value="{{ old('mobile') }}"
                                                       placeholder="{{ trans('general.mobile') }}" required autofocus>
                                                @if ($errors->has('mobile'))
                                                    <span class="help-block">
                                                <strong>
                                                    {{ $errors->first('mobile') }}
                                                </strong>
                                            </span>
                                                @endif
                                            </div>
                                        </div>

                                        @can('isAdminOrAbove')
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label for="single"
                                                           class="control-label">{{ trans('general.owner') }}
                                                        *</label>
                                                    <select id="" name="user_id" class="form-control select2" required>
                                                        <option value="">{{ trans('general.choose_user') }}</option>
                                                        @foreach($users as $user)
                                                            <option value="{{ $user->id }}">{{ $user->slug }}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                        @else
                                            <input type="hidden" name="user_id" value="{{ auth()->id() }}">
                                        @endif
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label for="form_control_1">{{ trans('general.main_image') }}</label>
                                                <input type="file" class="form-control tooltips" data-container="body"
                                                       data-placement="top"
                                                       data-original-title="{{ trans('message.main_image') }}"
                                                       name="image" placeholder="{{ trans('general.main_image') }}"
                                                       required>
                                                <div class="help-block text-left">
                                                    {{ trans('message.best_fit',['width' => '1080 px', 'height' => '1440 px']) }}
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label for="file"
                                                       class="control-label">{{ trans('general.more_images') }}
                                                    *</label>
                                                <input class="form-control tooltips" data-container="body"
                                                       data-placement="top"
                                                       data-original-title="{{ trans('message.more_images') }}"
                                                       name="images[]" placeholder="{{ trans('message.more_images') }}"
                                                       type="file" multiple required/>
                                                <div class="help-block text-left">
                                                    {{ trans('message.best_fit',['width' => '1080 px', 'height' => '1440 px']) }}
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        @if($categories->isNotEmpty())
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label for="single"
                                                           class="control-label">{{ trans('general.main_category') }}
                                                        *</label>
                                                    <select id="" name="category_id" class="form-control select2"
                                                            required>
                                                        <option value="">{{ trans('general.choose_category') }}</option>
                                                        @foreach($categories as $category)
                                                            <option value="{{ $category->id }}"
                                                                    style="background-color: {{ $category->is_parent ? 'blue' : null  }}">{{ $category->name }}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                        @endif
                                            @if(!$categories->isEmpty())
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label class="control-label">{{ trans('general.more_categories') }}
                                                            *</label>
                                                        <select multiple="multiple" class="multi-select"
                                                                id="my_multi_select1" name="categories[]">
                                                            @foreach($categories as $category)
                                                                <option value="{{ $category->id }}"
                                                                        style="background-color: {{ $category->isParent ? 'lightblue' : null  }}">
                                                                    {{ $category->name }}</option>
                                                                @if(!$category->children->isEmpty())
                                                                    @foreach($category->children as $child)
                                                                        <option value="{{ $child->id }}"
                                                                                style="padding-left: 15px">
                                                                            {{ $child->name }}</option>
                                                                        @if(!$child->children->isEmpty())
                                                                            @foreach($child->children as $subChild)
                                                                                <option value="{{ $subChild->id }}"
                                                                                        style="padding-left: 35px">
                                                                                    {{ $subChild->name }}</option>
                                                                            @endforeach
                                                                        @endif
                                                                    @endforeach
                                                                @endif
                                                            @endforeach
                                                        </select>
                                                        {{-- <span class="help-block">
                                                                                                                                            <strong>{{ trans('message.categories_instructions') }}</strong>
                                                        </span> --}}
                                                    </div>
                                                </div>
                                            @endif
                                        @if(!$countries->isEmpty())
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label for="single"
                                                           class="control-label">{{ trans('general.country') }}
                                                        *</label>
                                                    <select id="" name="country_id" class="form-control select2"
                                                            required>
                                                        <option value="">{{ trans('general.choose_country') }}</option>
                                                        @foreach($countries as $country)
                                                            <option value="{{ $country->id }}"
                                                                    style="background-color: {{ $country->is_parent ? 'blue' : null  }}">{{ $country->name }}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                        @endif

                                        @if(!$tags->isEmpty())
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label class="control-label">{{ trans('general.tags') }}</label>
                                                    <select multiple="multiple" class="multi-select"
                                                            id="my_multi_select2" name="tags[]">
                                                        @foreach($tags as $tag)
                                                            <option value="{{ $tag->id }}">{{ $tag->name }}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                        @endif

                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="description"
                                                       class="control-label">{{ trans('general.description_arabic') }}</label>
                                                <textarea type="text" class="form-control tooltips"
                                                          data-container="body" data-placement="top"
                                                          data-original-title="{{ trans('message.description_ar') }}"
                                                          id="description_ar" name="description_ar"
                                                          aria-multiline="true"
                                                          maxlength="500" {{ old('description_ar') }}></textarea>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="description"
                                                       class="control-label">{{ trans('general.description_english') }}</label>
                                                <textarea type="text" class="form-control tooltips"
                                                          data-container="body" data-placement="top"
                                                          data-original-title="{{ trans('message.description_en') }}"
                                                          id="description_en" name="description_en"
                                                          aria-multiline="true"
                                                          maxlength="500">{{ old('description_en') }}</textarea>
                                            </div>
                                        </div>

                                        <div class="col-md-3">
                                            <div class="form-group{{ $errors->has('keywords') ? ' has-error' : '' }}">
                                                <label for="keywords"
                                                       class="control-label">{{ trans('general.keywords') }}</label>
                                                <input id="keywords" type="text" class="form-control tooltips"
                                                       data-container="body" data-placement="top"
                                                       data-original-title="{{ trans('message.keywords') }}"
                                                       name="keywords" placeholder="{{ trans('general.keywords') }}"
                                                       value="{{ old('keywords') }}" autofocus>
                                                @if ($errors->has('keywords'))
                                                    <span class="help-block">
                                                <strong>
                                                    {{ $errors->first('keywords') }}
                                                </strong>
                                            </span>
                                                @endif
                                            </div>
                                        </div>

                                        <div class="col-md-6">
                                            <div class="form-group{{ $errors->has('expired_at') ? ' has-error' : '' }}">
                                                <label for="expired_at"
                                                       class="control-label">{{ trans('general.expired_at_date') }}</label>
                                                <div class="input-group date form_datetime">
                                                    <input type="text" readonly
                                                           style="direction: ltr !important;"
                                                           class="form-control tooltips" data-container="body"
                                                           data-placement="top"
                                                           data-original-title="{{ trans('message.expired_at_date') }}"
                                                           name="expired_at"
                                                           value="{{ \Carbon\Carbon::now()->addWeeks(4)->format('d F Y - h:i') }}"
                                                           required>
                                                    <span class="input-group-btn"><button
                                                                class="btn default date-set" type="button"><i
                                                                    class="fa fa-calendar"></i></button></span>
                                                </div>
                                                <span class="help-block"><strong>{{ trans('message.expired_at_date') }}</strong></span>
                                            </div>
                                        </div>

                                        <div class="col-md-3">
                                            <div class="form-group{{ $errors->has('video_url_one') ? ' has-error' : '' }}">
                                                <label for="video_url_one"
                                                       class="control-label">{{ trans('general.video_url_one') }}</label>
                                                <input id="video_url_one" type="url"
                                                       class="form-control tooltips" data-container="body"
                                                       data-placement="top"
                                                       data-original-title="{{ trans('message.video_url_one') }}"
                                                       name="video_url_one" value="{{ old('video_url_one') }}"
                                                       placeholder="{{ trans('general.video_url_one') }}"
                                                       autofocus>
                                                @if ($errors->has('video_url_one'))
                                                    <span class="help-block">
                                                            <strong>
                                                                {{ $errors->first('video_url_one') }}
                                                            </strong>
                                                        </span>
                                                @endif
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group{{ $errors->has('video_url_two') ? ' has-error' : '' }}">
                                                <label for="video_url_two"
                                                       class="control-label">{{ trans('general.video_url_two') }}</label>
                                                <input id="video_url_two" type="url"
                                                       class="form-control tooltips" data-container="body"
                                                       data-placement="top"
                                                       data-original-title="{{ trans('message.video_url_two') }}"
                                                       name="video_url_two" value="{{ old('video_url_two') }}"
                                                       placeholder="{{ trans('general.video_url_two') }}"
                                                       autofocus>
                                                @if ($errors->has('video_url_two'))
                                                    <span class="help-block">
                                            <strong>
                                                {{ $errors->first('video_url_two') }}
                                            </strong>
                                        </span>
                                                @endif
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group{{ $errors->has('video_url_three') ? ' has-error' : '' }}">
                                                <label for="video_url_three"
                                                       class="control-label">{{ trans('general.video_url_three') }}</label>
                                                <input id="video_url_three" type="url"
                                                       class="form-control tooltips" data-container="body"
                                                       data-placement="top"
                                                       data-original-title="{{ trans('message.video_url_three') }}"
                                                       name="video_url_three" value="{{ old('video_url_three') }}"
                                                       placeholder="{{ trans('general.video_url_three') }}"
                                                       autofocus>
                                                @if ($errors->has('video_url_three'))
                                                    <span class="help-block">
                                                            <strong>
                                                                {{ $errors->first('video_url_three') }}
                                                            </strong>
                                                        </span>
                                                @endif
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group{{ $errors->has('video_url_four') ? ' has-error' : '' }}">
                                                <label for="video_url_four"
                                                       class="control-label">{{ trans('general.video_url_four') }}</label>
                                                <input id="video_url_four" type="url"
                                                       class="form-control tooltips" data-container="body"
                                                       data-placement="top"
                                                       data-original-title="{{ trans('message.video_url_four') }}"
                                                       name="video_url_four" value="{{ old('video_url_four') }}"
                                                       placeholder="{{ trans('general.video_url_four') }}"
                                                       autofocus>
                                                @if ($errors->has('video_url_four'))
                                                    <span class="help-block">
                                                            <strong>
                                                                {{ $errors->first('video_url_four') }}
                                                            </strong>
                                                        </span>
                                                @endif
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group{{ $errors->has('video_url_five') ? ' has-error' : '' }}">
                                                <label for="video_url_five"
                                                       class="control-label">{{ trans('general.video_url_five') }}</label>
                                                <input id="video_url_five" type="url"
                                                       class="form-control tooltips" data-container="body"
                                                       data-placement="top"
                                                       data-original-title="{{ trans('message.video_url_five') }}"
                                                       name="video_url_five" value="{{ old('video_url_five') }}"
                                                       placeholder="{{ trans('general.video_url_five') }}"
                                                       autofocus>
                                                @if ($errors->has('video_url_five'))
                                                    <span class="help-block">
                                                            <strong>
                                                                {{ $errors->first('video_url_five') }}
                                                            </strong>
                                                        </span>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="form-body">
                        <div class="portlet box blue ">
                            <div class="portlet-title">
                                <div class="caption">
                                    <i class="fa fa-gift"></i> {{ trans('general.more_details') }}
                                </div>
                            </div>
                            <div class="portlet-body form">
                                <div class="form-body">
                                    <div class="row">

                                        <div class="col-md-4">
                                            <div class="form-group {{ $errors->has('address') ? ' has-error' : '' }}">
                                                <label for="address"
                                                       class="control-label">{{ trans('general.address') }}
                                                    *</label>
                                                <input id="address" type="text" class="form-control tooltips"
                                                       data-container="body" data-placement="top"
                                                       data-original-title="{{ trans('message.address') }}"
                                                       name="address" value="{{ old('address') }}"
                                                       placeholder="{{ trans('general.address') }}" autofocus>
                                                @if ($errors->has('address'))
                                                    <span class="help-block">
                                                <strong>
                                                    {{ $errors->first('address') }}
                                                </strong>
                                            </span>
                                                @endif
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group {{ $errors->has('longitude') ? ' has-error' : '' }}">
                                                <label for="longitude"
                                                       class="control-label">{{ trans('general.longitude') }}
                                                    *</label>
                                                <input id="longitude" type="text" class="form-control tooltips"
                                                       data-container="body" data-placement="top"
                                                       data-original-title="{{ trans('message.longitude') }}"
                                                       name="longitude" value="{{ old('longitude') }}"
                                                       placeholder="{{ trans('general.longitude') }}" autofocus>
                                                @if ($errors->has('longitude'))
                                                    <span class="help-block">
                                                <strong>
                                                    {{ $errors->first('longitude') }}
                                                </strong>
                                            </span>
                                                @endif
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group {{ $errors->has('latitude') ? ' has-error' : '' }}">
                                                <label for="latitude"
                                                       class="control-label">{{ trans('general.latitude') }}
                                                    *</label>
                                                <input id="latitude" type="text" class="form-control tooltips"
                                                       data-container="body" data-placement="top"
                                                       data-original-title="{{ trans('message.latitude') }}"
                                                       name="latitude" value="{{ old('latitude') }}"
                                                       placeholder="{{ trans('general.latitude') }}" autofocus>
                                                @if ($errors->has('latitude'))
                                                    <span class="help-block">
                                                <strong>
                                                    {{ $errors->first('latitude') }}
                                                </strong>
                                            </span>
                                                @endif
                                            </div>
                                        </div>


                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="form-body">
                        <div class="portlet box blue ">
                            <div class="portlet-title">
                                <div class="caption">
                                    <i class="fa fa-gift"></i> {{ trans('general.more_details') }}
                                </div>
                            </div>
                            <div class="portlet-body form">
                                <div class="form-body">
                                    <div class="row">
                                        @can('isAdminOrAbove')
                                            <div class="col-md-3">
                                                <div class="form-group">
                                                    <label class="control-label sbold tooltips" data-container="body"
                                                           data-placement="top"
                                                           data-original-title="{{ trans('message.active') }}">{{ trans('general.active') }}</label></br>
                                                    <label class="radio-inline">
                                                        <input type="radio" name="active" id="optionsRadios1" value="1"
                                                               checked>
                                                        {{ trans('general.yes') }} </label>
                                                    <label class="radio-inline">
                                                        <input type="radio" name="active" id="optionsRadios2"
                                                               value="0"> {{ trans('general.no') }}</label>
                                                </div>
                                            </div>
                                        @else
                                            <input type="hidden" name="active" value="1">
                                        @endif
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label class="control-label sbold tooltips" data-container="body"
                                                       data-placement="top"
                                                       data-original-title="{{ trans('message.on_home') }}">{{ trans('general.on_home') }}</label></br>
                                                <label class="radio-inline">
                                                    <input type="radio" name="on_home" id="optionsRadios1"
                                                           value="1"> {{ trans('general.yes') }} </label>
                                                <label class="radio-inline">
                                                    <input type="radio" name="on_home" id="optionsRadios2" checked
                                                           value="0"> {{ trans('general.no') }}</label>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label class="control-label sbold tooltips" data-container="body"
                                                       data-placement="top"
                                                       data-original-title="{{ trans('message.is_real_estate') }}">{{ trans('general.is_real_estate') }}</label></br>
                                                <label class="radio-inline">
                                                    <input type="radio" name="is_real_estate" id="optionsRadios1"
                                                           value="1">
                                                    {{ trans('general.yes') }} </label>
                                                <label class="radio-inline">
                                                    <input type="radio" name="is_real_estate" id="optionsRadios2"
                                                           checked
                                                           value="0"> {{ trans('general.no') }}</label>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label class="control-label sbold tooltips" data-container="body"
                                                       data-placement="top"
                                                       data-original-title="{{ trans('message.only_whatsapp') }}">{{ trans('general.only_whatsapp') }}</label></br>
                                                <label class="radio-inline">
                                                    <input type="radio" name="only_whatsapp" id="optionsRadios1"
                                                           value="1">
                                                    {{ trans('general.yes') }} </label>
                                                <label class="radio-inline">
                                                    <input type="radio" name="only_whatsapp" id="optionsRadios2" checked
                                                           value="0"> {{ trans('general.no') }}</label>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label class="control-label sbold tooltips" data-container="body"
                                                       data-placement="top"
                                                       data-original-title="{{ trans('message.exclusive') }}">{{ trans('general.exclusive') }}</label></br>
                                                <label class="radio-inline">
                                                    <input type="radio" name="is_exclusive" id="optionsRadios1"
                                                           value="1">
                                                    {{ trans('general.yes') }} </label>
                                                <label class="radio-inline">
                                                    <input type="radio" name="is_exclusive" id="optionsRadios2" checked
                                                           value="0"> {{ trans('general.no') }}</label>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label class="control-label sbold tooltips" data-container="body"
                                                       data-placement="top"
                                                       data-original-title="{{ trans('message.featured') }}">{{ trans('general.featured') }}</label></br>
                                                <label class="radio-inline">
                                                    <input type="radio" name="is_featured" id="optionsRadios1"
                                                           value="1">
                                                    {{ trans('general.yes') }} </label>
                                                <label class="radio-inline">
                                                    <input type="radio" name="is_featured" id="optionsRadios2" checked
                                                           value="0"> {{ trans('general.no') }}</label>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label class="control-label sbold tooltips" data-container="body"
                                                       data-placement="top"
                                                       data-original-title="{{ trans('message.is_negotiable') }}">{{ trans('general.is_negotiable') }}</label></br>
                                                <label class="radio-inline">
                                                    <input type="radio" name="is_negotiable" id="optionsRadios1"
                                                           value="1">
                                                    {{ trans('general.yes') }} </label>
                                                <label class="radio-inline">
                                                    <input type="radio" name="is_negotiable" id="optionsRadios2" checked
                                                           value="0"> {{ trans('general.no') }}</label>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label class="control-label sbold tooltips" data-container="body"
                                                       data-placement="top"
                                                       data-original-title="{{ trans('message.is_available') }}">{{ trans('general.is_available') }}</label></br>
                                                <label class="radio-inline">
                                                    <input type="radio" name="is_available" id="optionsRadios1"
                                                           value="1">
                                                    {{ trans('general.yes') }} </label>
                                                <label class="radio-inline">
                                                    <input type="radio" name="is_available" id="optionsRadios2" checked
                                                           value="0"> {{ trans('general.no') }}</label>
                                            </div>
                                        </div>

                                        <div class="col-lg-12">
                                            @include('backend.partials.forms._btn-group')
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    @parent
    <script src="{{ mix('js/datepicker.js') }}"></script>
@endsection
