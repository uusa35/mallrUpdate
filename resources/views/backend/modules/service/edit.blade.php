@extends('backend.layouts.app')

@section('breadcrumbs')
    {{ Breadcrumbs::render('backend.service.edit', $element) }}
@endsection

@section('content')
    <div class="portlet box blue">
        @include('backend.partials.forms.form_title',['title' => trans('general.edit_service')])
        <div class="portlet-body">
            @include('backend.partials._admin_instructions',['title' => trans('general.products') ,'message' =>
            trans('message.edit_service')])
            <div class="portlet-body form">
                <form class="horizontal-form" role="form" method="POST"
                      action="{{ route('backend.service.update', $element->id) }}"
                      enctype="multipart/form-data">
                    @csrf
                    @method('put')
                    <div class="form-body">
                        <h3 class="form-section">{{ trans('general.edit_service') }}</h3>
                        <div class="portlet box blue ">
                            <div class="portlet-title">
                                <div class="caption">
                                    <i class="fa fa-gift"></i> {{ trans('general.main_details') }}
                                </div>
                            </div>
                            <div class="portlet-body form">
                                <div class="form-body">
                                    <div class="row">
                                        <div class="col-md-4">
                                            <div class="form-group {{ $errors->has('sku') ? ' has-error' : '' }}">
                                                <label for="sku" class="control-label">{{ trans('general.sku') }}
                                                    *</label>
                                                <input id="sku" type="text" class="form-control tooltips"
                                                       data-container="body" data-placement="top"
                                                       data-original-title="{{ trans('message.sku') }}" name="sku"
                                                       value="{{ $element->sku }}"
                                                       placeholder="{{ trans('general.sku') }}"
                                                       required autofocus>
                                                @if ($errors->has('sku'))
                                                    <span class="help-block">
                                                <strong>
                                                    {{ $errors->first('sku') }}
                                                </strong>
                                            </span>
                                                @endif
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group {{ $errors->has('name_ar') ? ' has-error' : '' }}">
                                                <label for="name_ar"
                                                       class="control-label">{{ trans('general.name_ar') }}
                                                    *</label>
                                                <input id="name_ar" type="text" class="form-control tooltips"
                                                       data-container="body" data-placement="top"
                                                       data-original-title="{{ trans('message.name_ar') }}"
                                                       name="name_ar" value="{{ $element->name_ar }}"
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
                                                       name="name_en" value="{{ $element->name_en }}"
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
                                            <div class="form-group {{ $errors->has('duration') ? ' has-error' : '' }}">
                                                <label for="duration"
                                                       class="control-label">{{ trans('general.duration') }}</label>
                                                <input id="duration" type="number" class="form-control tooltips"
                                                       data-container="body" data-placement="top"
                                                       data-original-title="{{ trans('message.duration') }}"
                                                       name="duration" value="{{ $element->duration }}"
                                                       placeholder="{{ trans('general.duration') }}" autofocus>
                                                @if ($errors->has('duration'))
                                                    <span class="help-block">
                                                <strong>
                                                    {{ $errors->first('duration') }}
                                                </strong>
                                            </span>
                                                @endif
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group {{ $errors->has('delivery_time') ? ' has-error' : '' }}">
                                                <label for="delivery_time"
                                                       class="control-label">{{ trans('general.delivery_time') }}
                                                </label>
                                                <input id="delivery_time" type="number" class="form-control tooltips"
                                                       data-container="body" data-placement="top"
                                                       data-original-title="{{ trans('message.delivery_time') }}"
                                                       name="delivery_time" value="{{ $element->delivery_time }}"
                                                       placeholder="{{ trans('general.delivery_time') }}"
                                                       autofocus>
                                                @if ($errors->has('delivery_time'))
                                                    <span class="help-block">
                                                <strong>
                                                    {{ $errors->first('delivery_time') }}
                                                </strong>
                                            </span>
                                                @endif
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group {{ $errors->has('setup_time') ? ' has-error' : '' }}">
                                                <label for="setup_time"
                                                       class="control-label">{{ trans('general.setup_time') }}</label>
                                                <input id="setup_time" type="number" maxlength="1" max="10"
                                                       class="form-control tooltips" data-container="body"
                                                       data-placement="top"
                                                       data-original-title="{{ trans('message.setup_time') }}"
                                                       name="setup_time" value="{{ $element->setup_time }}"
                                                       placeholder="{{ trans('general.setup_time') }}"
                                                       autofocus>
                                                @if ($errors->has('setup_time'))
                                                    <span class="help-block">
                                                <strong>
                                                    {{ $errors->first('setup_time') }}
                                                </strong>
                                            </span>
                                                @endif
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group {{ $errors->has('individuals') ? ' has-error' : '' }}">
                                                <label for="individuals"
                                                       class="control-label">{{ trans('general.individuals') }}</label>
                                                <input id="individuals" maxlength="2" max="99" type="number"
                                                       class="form-control tooltips" data-container="body"
                                                       data-placement="top"
                                                       data-original-title="{{ trans('message.individuals') }}"
                                                       name="individuals"
                                                       placeholder="{{ trans('general.individuals') }}"
                                                       value="{{ $element->individuals }}"
                                                       autofocus>
                                                @if ($errors->has('individuals'))
                                                    <span class="help-block">
                                                <strong>
                                                    {{ $errors->first('individuals') }}
                                                </strong>
                                            </span>
                                                @endif
                                            </div>
                                        </div>
                                        {{--                                        <div class="col-md-4">--}}
                                        {{--                                            <div class="form-group {{ $errors->has('delivery_charge') ? ' has-error' : '' }}">--}}
                                        {{--                                                <label for="delivery_charge"--}}
                                        {{--                                                       class="control-label">{{ trans('general.delivery_charge') }}--}}
                                        {{--                                                    *</label>--}}
                                        {{--                                                <input id="delivery_charge" type="number" class="form-control tooltips"--}}
                                        {{--                                                       data-container="body" data-placement="top"--}}
                                        {{--                                                       data-original-title="{{ trans('message.delivery_charge') }}"--}}
                                        {{--                                                       name="delivery_charge" value=""--}}
                                        {{--                                                       placeholder="{{ trans('general.delivery_charge') }}"--}}
                                        {{--                                                       autofocus>--}}
                                        {{--                                                @if ($errors->has('delivery_charge'))--}}
                                        {{--                                                    <span class="help-block">--}}
                                        {{--                                                <strong>--}}
                                        {{--                                                    {{ $errors->first('delivery_charge') }}--}}
                                        {{--                                                </strong>--}}
                                        {{--                                            </span>--}}
                                        {{--                                                @endif--}}
                                        {{--                                            </div>--}}
                                        {{--                                        </div>--}}


                                        <div class="col-md-4">
                                            <div class="form-group{{ $errors->has('price') ? ' has-error' : '' }}">
                                                <label for="price" class="control-label">{{ trans('general.price') }}
                                                    *</label>
                                                <input id="price" type="text" class="form-control tooltips"
                                                       data-container="body" data-placement="top"
                                                       data-original-title="{{ trans('message.price') }}" name="price"
                                                       value="{{ $element->price }}"
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
                                            <div class="form-group{{ $errors->has('sale_price') ? ' has-error' : '' }}">
                                                <label for="sale_price"
                                                       class="control-label">{{ trans('general.sale_price') }}
                                                    *</label>
                                                <input id="sale_price" type="text" class="form-control tooltips"
                                                       data-container="body" data-placement="top"
                                                       data-original-title="{{ trans('message.sale_price') }}"
                                                       name="sale_price" value="{{ $element->sale_price }}"
                                                       placeholder="{{ trans('general.sale_price') }} " required
                                                       autofocus>
                                                @if ($errors->has('sale_price'))
                                                    <span class="help-block">
                                                <strong>
                                                    {{ $errors->first('sale_price') }}
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
                                                            <option value="{{ $user->id }}" {{ $user->id === $element->user_id ? 'selected' : null }}>{{ $user->slug }}</option>
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
                                                >
                                                <div class="help-block text-left">
                                                    {{ trans('message.best_fit',['width' => '1080 px', 'height' => '1440 px']) }}
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-1">
                                            <img src="{{ $element->imageThumbLink }}" alt=""
                                                 class="img-responsive img-rounded">
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="file"
                                                       class="control-label">{{ trans('general.more_images') }}
                                                    *</label>

                                                <input class="form-control tooltips" data-container="body"
                                                       data-placement="top"
                                                       data-original-title="{{ trans('message.more_images') }}"
                                                       name="images[]" placeholder="{{ trans('message.more_images') }}"
                                                       type="file" multiple/>
                                                <div class="help-block text-left">
                                                    {{ trans('message.best_fit',['width' => '1080 px', 'height' => '1440 px']) }}
                                                </div>
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
                                                       name="video_url_one"
                                                       value="{{ $element->video_url_one }}"
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
                                                       name="video_url_two"
                                                       value="{{ $element->video_url_two }}"
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
                                                       name="video_url_three"
                                                       value="{{ $element->video_url_three }}"
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
                                                       name="video_url_four"
                                                       value="{{ $element->video_url_four }}"
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
                                                       name="video_url_five"
                                                       value="{{ $element->video_url_five }}"
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
                                        <div class="col-md-3">
                                            <div class="form-group{{ $errors->has('start_sale') ? ' has-error' : '' }}">
                                                <label for="start_sale"
                                                       class="control-label">{{ trans('general.start_sale_date') }}</label>
                                                <div class="input-group date form_datetime">
                                                    <input type="text" readonly style="direction: ltr !important;"
                                                           class="form-control tooltips" data-container="body"
                                                           data-placement="top"
                                                           data-original-title="{{ trans('message.start_sale_date') }}"
                                                           name="start_sale"
                                                           value="{{ $element->start_sale ? $element->start_sale : '01 January 2019 - 07:55' }}"
                                                           required>
                                                    <span class="input-group-btn"><button class="btn default date-set"
                                                                                          type="button"><i
                                                                    class="fa fa-calendar"></i></button></span>
                                                </div>
                                                <span class="help-block">
                                                <strong>{{ trans('message.start_sale_date') }}</strong>
                                            </span>
                                            </div>
                                        </div>
                                        <div class="col-lg-3">
                                            <div class="form-group">
                                                <label class="control-label">{{ trans('general.end_sale_date') }}</label>
                                                <div class="input-group date form_datetime">
                                                    <input type="text" class="form-control tooltips"
                                                           data-container="body" data-placement="top"
                                                           data-original-title="{{ trans('message.end_sale_date') }}"
                                                           readonly style="direction: ltr !important;" name="end_sale"
                                                           value="{{ $element->end_sale ? $element->end_sale : '01 January 2019 - 07:55' }}"
                                                           required>
                                                    <span class="input-group-btn"><button class="btn default date-set"
                                                                                          type="button"><i
                                                                    class="fa fa-calendar"></i></button></span>
                                                </div>
                                                <span class="help-block">
                                                <strong>{{ trans('message.end_sale_date') }}</strong>
                                            </span>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group{{ $errors->has('booking_limit') ? ' has-error' : '' }}">
                                                <label for="booking_limit"
                                                       class="control-label">{{ trans('general.booking_limit') }}</label>
                                                <input id="booking_limit" type="number" class="form-control tooltips"
                                                       data-container="body" data-placement="top"
                                                       data-original-title="{{ trans('message.booking_limit') }}"
                                                       name="booking_limit"
                                                       max="5"
                                                       maxlength="1"
                                                       placeholder="{{ trans('general.booking_limit') }}"
                                                       value="{{ $element->booking_limit }}" autofocus>
                                                @if ($errors->has('booking_limit'))
                                                    <span class="help-block">
                                                <strong>
                                                    {{ $errors->first('booking_limit') }}
                                                </strong>
                                            </span>
                                                @endif
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
                                                       value="{{ $element->keywords }}" autofocus>
                                                @if ($errors->has('keywords'))
                                                    <span class="help-block">
                                                <strong>
                                                    {{ $errors->first('keywords') }}
                                                </strong>
                                            </span>
                                                @endif
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label for="description"
                                                       class="control-label">{{ trans('general.description_arabic') }}</label>
                                                <textarea type="text" class="form-control tooltips"
                                                          data-container="body" data-placement="top"
                                                          data-original-title="{{ trans('message.description_ar') }}"
                                                          id="description_ar" name="description_ar"
                                                          aria-multiline="true"
                                                          maxlength="500" {{ $element->description_ar }}></textarea>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="description"
                                                       class="control-label">{{ trans('general.description_english') }}</label>
                                                <textarea type="text" class="form-control tooltips"
                                                          data-container="body" data-placement="top"
                                                          data-original-title="{{ trans('message.description_en') }}"
                                                          id="description_en" name="description_en"
                                                          aria-multiline="true"
                                                          maxlength="500">{{ $element->description_en }}</textarea>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="notes_ar"
                                                       class="control-label">{{ trans('general.notes_ar') }}</label>
                                                <textarea type="text" class="form-control tooltips"
                                                          data-container="body" data-placement="top"
                                                          data-original-title="{{ trans('message.notes_ar') }}"
                                                          id="notes_ar" name="notes_ar" aria-multiline="true"
                                                          maxlength="500" {{ $element->notes_ar }}></textarea>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="notes_en"
                                                       class="control-label">{{ trans('general.notes_en') }}</label>
                                                <textarea type="text" class="form-control tooltips"
                                                          data-container="body" data-placement="top"
                                                          data-original-title="{{ trans('message.notes_en') }}"
                                                          id="notes_en" name="notes_en" aria-multiline="true"
                                                          maxlength="500">{{ $element->notes_en }}</textarea>
                                            </div>
                                        </div>
                                        @if(!$categories->isEmpty())
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label class="control-label">{{ trans('general.categories') }}
                                                        *</label>
                                                    <select multiple="multiple" class="multi-select"
                                                            id="my_multi_select1" name="categories[]">
                                                        @foreach($categories as $category)
                                                            <option value="{{ $category->id }}"
                                                                    {{ in_array($category->id,$element->categories->pluck('id')->unique()->flatten()->toArray()) ? 'selected' : null }}
                                                                    style="background-color: {{ $category->isParent ? 'lightblue' : null  }}">
                                                                {{ $category->name }}</option>
                                                            @if(!$category->children->isEmpty())
                                                                @foreach($category->children as $child)
                                                                    <option value="{{ $child->id }}"
                                                                            {{ in_array($child->id,$element->categories->pluck('id')->unique()->flatten()->toArray()) ? 'selected' : null }}
                                                                            style="padding-left: 15px">
                                                                        {{ $child->name }}</option>
                                                                    @if(!$child->children->isEmpty())
                                                                        @foreach($child->children as $subChild)
                                                                            <option value="{{ $subChild->id }}"
                                                                                    {{ in_array($subChild->id,$element->categories->pluck('id')->unique()->flatten()->toArray()) ? 'selected' : null }}
                                                                                    style="padding-left: 35px">
                                                                                {{ $subChild->name }}</option>
                                                                        @endforeach
                                                                    @endif
                                                                @endforeach
                                                            @endif
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
                                                            <option value="{{ $tag->id }}" {{ in_array($tag->id,$element->tags->pluck('id')->unique()->flatten()->toArray()) ? 'selected' : null }}
                                                            >{{ $tag->name }}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                        @endif
                                        @can('index','video')
                                            @if(!$videos->isEmpty())
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label class="control-label">{{ trans('general.attach_videos_to_product') }}</label>
                                                        <select multiple="multiple" class="multi-select"
                                                                id="my_multi_select3" name="videos[]">
                                                            @foreach($videos as $video)
                                                                <option value="{{ $video->id }}" {{ in_array($video->id,$element->tags->pluck('id')->unique()->flatten()->toArray()) ? 'selected' : null }}
                                                                >{{ $video->name }}</option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                </div>
                                            @endif
                                        @endcan

                                        @can('index','area')
                                            @if(!$areas->isEmpty())
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label class="control-label">{{ trans('general.areas') }}</label>
                                                        <select multiple="multiple" class="multi-select"
                                                                id="my_multi_select4" name="areas[]">
                                                            <option disabled value=""
                                                                    style="background-color: lightgrey">{{  $areas->first()->country->slug }}</option>
                                                            @if($element->areas->isEmpty())
                                                                <option value="all"
                                                                        style="background-color: lightgrey">{{  trans('general.all_areas') }}</option>
                                                            @endif
                                                            @foreach($areas as $area)
                                                                <option value="{{ $area->id }}" {{ in_array($area->id,$element->areas->pluck('id')->unique()->flatten()->toArray()) ? 'selected' : null }}
                                                                >{{ $area->slug }}</option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                </div>
                                            @endif
                                        @endif
                                        @if($timings->isNotEmpty())
                                            <div class="col-md-4" id="timings">
                                                <div class="form-group">
                                                    <label class="control-label">{{ trans('general.timings') }}*</label>
                                                    <select multiple="multiple" class="multi-select"
                                                            id="my_multi_select5" name="timings[]" required>
                                                        @foreach($timings as $set)
                                                            @foreach($set as $timing)
                                                                <option value="{{ $timing->id }}"
                                                                        {{ in_array($timing->id,$element->timings->pluck('id')->unique()->flatten()->toArray()) ? 'selected' : null }}
                                                                >{{ $timing->day_name }}
                                                                    - {{  $timing->startDuty }}
                                                                    : {{ $timing->endDuty  }}</option>
                                                            @endforeach
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                        @endif
                                        <div class="col-md-3">
                                            <div class="form-group{{ $errors->has('start_date') ? ' has-error' : '' }}">
                                                <label for="start_date"
                                                       class="control-label">{{ trans('general.start_date') }}</label>
                                                <div class="input-group date form_datetime">
                                                    <input type="text" readonly style="direction: ltr !important;"
                                                           class="form-control tooltips" data-container="body"
                                                           data-placement="top"
                                                           data-original-title="{{ trans('message.start_date') }}"
                                                           name="start_date"
                                                           value="{{ $element->start_date ? $element->start_date : '01 January 2019 - 07:55' }}"
                                                           required>
                                                    <span class="input-group-btn"><button class="btn default date-set"
                                                                                          type="button"><i
                                                                    class="fa fa-calendar"></i></button></span>
                                                </div>
                                                <span class="help-block">
                                                <strong>{{ trans('message.start_date') }}</strong>
                                            </span>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group{{ $errors->has('end_date') ? ' has-error' : '' }}">
                                                <label for="end_date"
                                                       class="control-label">{{ trans('general.end_date') }}*</label>
                                                <div class="input-group date form_datetime">
                                                    <input type="text" readonly style="direction: ltr !important;"
                                                           class="form-control tooltips" data-container="body"
                                                           data-placement="top"
                                                           data-original-title="{{ trans('message.end_date') }}"
                                                           name="end_date"
                                                           value="{{ $element->end_date ? $element->end_date : '01 January 2019 - 07:55' }}"
                                                           required>
                                                    <span class="input-group-btn"><button class="btn default date-set"
                                                                                          type="button"><i
                                                                    class="fa fa-calendar"></i></button></span>
                                                </div>
                                                <span class="help-block">
                                                <strong>{{ trans('message.end_date') }}</strong>
                                            </span>
                                            </div>
                                        </div>
                                        <div class="col-md-4 hidden">
                                            <div class="form-group{{ $errors->has('range') ? ' has-error' : '' }}">
                                                <label for="range" class="control-label">{{ trans('general.week_range') }}
                                                    </label>
                                                <input id="range" type="text" class="form-control tooltips"
                                                       data-container="body" data-placement="top"
                                                       data-original-title="{{ trans('message.range') }}" name="range"
                                                       value="{{ $element->range }}"
                                                       placeholder="{{ trans('general.range') }}" autofocus>
                                                @if ($errors->has('range'))
                                                    <span class="help-block">
                                                <strong>
                                                    {{ $errors->first('range') }}
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
                                        @can('index','addon')
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label class="control-label sbold tooltips"
                                                           data-container="body"
                                                           data-placement="top"
                                                           data-original-title="{{ trans('message.force_original_price') }}">{{ trans('general.force_original_price') }}</label></br>
                                                    <label class="radio-inline">
                                                        <input type="radio" name="force_original_price"
                                                               id="optionsRadios1"
                                                               value="1"
                                                                {{ $element->force_original_price  ? 'checked' : null }}
                                                        >
                                                        {{ trans('general.yes') }} </label>
                                                    <label class="radio-inline">
                                                        <input type="radio" name="force_original_price"
                                                               id="optionsRadios2"
                                                               {{ !$element->force_original_price  ? 'checked' : null }}
                                                               value="0"> {{ trans('general.no') }}</label>
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label class="control-label sbold tooltips"
                                                           data-container="body"
                                                           data-placement="top"
                                                           data-original-title="{{ trans('message.is_package') }}">{{ trans('general.is_package') }}</label></br>
                                                    <label class="radio-inline">
                                                        <input type="radio" name="is_package" id="optionsRadios1"
                                                               {{ $element->is_package  ? 'checked' : null }}
                                                               value="1">
                                                        {{ trans('general.yes') }} </label>
                                                    <label class="radio-inline">
                                                        <input type="radio" name="is_package" id="optionsRadios2"
                                                               {{ !$element->is_package  ? 'checked' : null }}
                                                               value="0"> {{ trans('general.no') }}</label>
                                                </div>
                                            </div>
                                            <div class="col-lg-6">
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label class="control-label sbold tooltips"
                                                               data-container="body"
                                                               data-placement="top"
                                                               data-original-title="{{ trans('message.has_addons') }}">{{ trans('general.has_addons') }}</label></br>
                                                        <label class="radio-inline">
                                                            <input type="radio" name="has_addons" id="hasAddons"
                                                                   {{ $element->has_addons  ? 'checked' : null }}
                                                                   value="1">
                                                            {{ trans('general.yes') }} </label>
                                                        <label class="radio-inline">
                                                            <input type="radio" name="has_addons" id="NohasAddons"
                                                                   {{ !$element->has_addons  ? 'checked' : null }}
                                                                   value="0"> {{ trans('general.no') }}</label>
                                                    </div>
                                                </div>
                                                @if($addOns->isNotEmpty())
                                                    <div class="col-md-8" id="addons">
                                                        <div class="form-group">
                                                            <label class="control-label">{{ trans('general.addons') }}</label>
                                                            <select multiple="multiple" class="multi-select"
                                                                    id="my_multi_select6" name="addons[]">
                                                                @foreach($addOns as $addon)
                                                                    <option value="{{ $addon->id }}"
                                                                            {{ in_array($addon->id,$element->addOns->pluck('id')->unique()->flatten()->toArray()) ? 'selected' : null }}
                                                                    >{{ $addon->name }}</option>
                                                                @endforeach
                                                            </select>
                                                        </div>
                                                    </div>
                                                @endif
                                            </div>
                                            <div class="col-lg-6">
                                                <div class="col-md-3">
                                                    <div class="form-group">
                                                        <label class="control-label sbold tooltips"
                                                               data-container="body"
                                                               data-placement="top"
                                                               data-original-title="{{ trans('message.has_only_items') }}">{{ trans('general.has_only_items') }}</label></br>
                                                        <label class="radio-inline">
                                                            <input type="radio" name="has_only_items" id="hasItems"
                                                                   {{ $element->has_only_items  ? 'checked' : null }}
                                                                   value="1"/>
                                                            {{ trans('general.yes') }} </label>
                                                        <label class="radio-inline">
                                                            <input type="radio" name="has_only_items"
                                                                   id="NoHasItems"
                                                                   {{ !$element->has_only_items  ? 'checked' : null }}
                                                                   value="0"/> {{ trans('general.no') }}</label>
                                                    </div>
                                                </div>
                                                @if($items->isNotEmpty())
                                                    <div class="col-md-9 " id="items">
                                                        <div class="form-group">
                                                            <label class="control-label">{{ trans('general.items') }}</label>
                                                            <select multiple="multiple" class="multi-select"
                                                                    id="my_multi_select7" name="items[]">
                                                                @foreach($items as $item)
                                                                    <option value="{{ $item->id }}"
                                                                            {{ in_array($item->id,$element->items->pluck('id')->unique()->flatten()->toArray()) ? 'selected' : null }}
                                                                    >{{ $item->name }}</option>
                                                                @endforeach
                                                            </select>
                                                        </div>
                                                    </div>
                                                @endif
                                            </div>
                                        @else
                                            <input type="hidden" name="has_addons" value="0">
                                            <input type="hidden" name="has_only_items" value="0">
                                            <input type="hidden" name="force_original_price" value="1">
                                            <input type="hidden" name="is_package" value="0">
                                        @endcan
                                    </div>
                                    <div class="row">
                                        @can('isAdminOrAbove')
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label class="control-label sbold tooltips" data-container="body"
                                                           data-placement="top"
                                                           data-original-title="{{ trans('message.active') }}">{{ trans('general.active') }}</label></br>
                                                    <label class="radio-inline">
                                                        <input type="radio" name="active" id="optionsRadios1" value="1"
                                                                {{ $element->active ? 'checked' : null }}
                                                        >
                                                        {{ trans('general.yes') }} </label>
                                                    <label class="radio-inline">
                                                        <input type="radio" name="active" id="optionsRadios2"
                                                               {{ !$element->active ? 'checked' : null }}
                                                               value="0"> {{ trans('general.no') }}</label>
                                                </div>
                                            </div>
                                        @endcan
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label class="control-label sbold tooltips" data-container="body"
                                                       data-placement="top"
                                                       data-original-title="{{ trans('message.on_sale') }}">{{ trans('general.on_sale') }}</label></br>
                                                <label class="radio-inline">
                                                    <input type="radio" name="on_sale" id="optionsRadios1"
                                                           value="1" {{ $element->on_sale ? 'checked' : null }}>
                                                    {{ trans('general.yes') }} </label>
                                                <label class="radio-inline">
                                                    <input type="radio" name="on_sale" id="optionsRadios2"
                                                           {{ !$element->on_sale ? 'checked' : null }}
                                                           value="0"> {{ trans('general.no') }}</label>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label class="control-label sbold tooltips" data-container="body"
                                                       data-placement="top"
                                                       data-original-title="{{ trans('message.exclusive') }}">{{ trans('general.exclusive') }}</label></br>
                                                <label class="radio-inline">
                                                    <input type="radio" name="exclusive" id="optionsRadios1"
                                                           value="1" {{ $element->exclusive ? 'checked' : null }}>
                                                    {{ trans('general.yes') }} </label>
                                                <label class="radio-inline">
                                                    <input type="radio" name="exclusive" id="optionsRadios2"
                                                           {{ !$element->exclusive ? 'checked' : null }}
                                                           value="0"> {{ trans('general.no') }}</label>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label class="control-label sbold tooltips" data-container="body"
                                                       data-placement="top"
                                                       data-original-title="{{ trans('message.on_new') }}">{{ trans('general.on_new') }}</label></br>
                                                <label class="radio-inline">
                                                    <input type="radio" name="on_new" id="optionsRadios1"
                                                           value="1" {{ $element->on_new ? 'checked' : null }}>
                                                    {{ trans('general.yes') }} </label>
                                                <label class="radio-inline">
                                                    <input type="radio" name="on_new" id="optionsRadios2"
                                                           {{ !$element->on_new ? 'checked' : null }}
                                                           value="0"> {{ trans('general.no') }}</label>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label class="control-label sbold tooltips" data-container="body"
                                                       data-placement="top"
                                                       data-original-title="{{ trans('message.is_available') }}">{{ trans('general.is_available') }}</label></br>
                                                <label class="radio-inline">
                                                    <input type="radio" name="is_available" id="optionsRadios1"
                                                           {{ $element->is_available ? 'checked' : null }}
                                                           value="1">
                                                    {{ trans('general.yes') }} </label>
                                                <label class="radio-inline">
                                                    <input type="radio" name="is_available" id="optionsRadios2"
                                                           {{ !$element->is_available ? 'checked' : null }}
                                                           value="0"> {{ trans('general.no') }}</label>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label class="control-label sbold tooltips" data-container="body"
                                                       data-placement="top"
                                                       data-original-title="{{ trans('message.is_hot_deal') }}">{{ trans('general.is_hot_deal') }}</label></br>
                                                <label class="radio-inline">
                                                    <input type="radio" name="is_hot_deal" id="optionsRadios1"
                                                           {{ $element->is_hot_deal ? 'checked' : null }}
                                                           value="1">
                                                    {{ trans('general.yes') }} </label>
                                                <label class="radio-inline">
                                                    <input type="radio" name="is_hot_deal" id="optionsRadios2"
                                                           {{ !$element->is_hot_deal ? 'checked' : null }}
                                                           value="0"> {{ trans('general.no') }}</label>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label class="control-label sbold tooltips" data-container="body"
                                                       data-placement="top"
                                                       data-original-title="{{ trans('message.multi_booking') }}">{{ trans('general.multi_booking') }}</label></br>
                                                <label class="radio-inline">
                                                    <input type="radio" name="multi_booking" id="optionsRadios1"
                                                           {{ $element->multi_booking ? 'checked' : null }}
                                                           value="1">
                                                    {{ trans('general.yes') }} </label>
                                                <label class="radio-inline">
                                                    <input type="radio" name="multi_booking" id="optionsRadios2"
                                                           {{ !$element->multi_booking ? 'checked' : null }}
                                                           value="0"> {{ trans('general.no') }}</label>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label class="control-label sbold tooltips" data-container="body"
                                                       data-placement="top"
                                                       data-original-title="{{ trans('message.on_home') }}">{{ trans('general.on_home') }}</label></br>
                                                <label class="radio-inline">
                                                    <input type="radio" name="on_home" id="optionsRadios1"
                                                           {{ $element->on_home ? 'checked' : null }}
                                                           value="1"> {{ trans('general.yes') }} </label>
                                                <label class="radio-inline">
                                                    <input type="radio" name="on_home" id="optionsRadios2"
                                                           {{ !$element->on_home ? 'checked' : null }}
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
                @include('backend.partials._element_images',['images' => $element->images])
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    @parent
    <script src="{{ mix('js/datepicker.js') }}"></script>
    <script>
        $('#hasAddons').on('click', function() {
            $('#addons').removeClass('hidden');
        });

        $('#NohasAddons').on('click', function() {
            $('#addons').addClass('hidden');
        });
        $('#hasItems').on('click', function() {
            $('#items').removeClass('hidden');
            $('#addons').addClass('hidden');
        });

        $('#NoHasItems').on('click', function() {
            $('#items').addClass('hidden');
        });
    </script>
@endsection
