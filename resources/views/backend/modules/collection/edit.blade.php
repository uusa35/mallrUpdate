@extends('backend.layouts.app')

@section('breadcrumbs')
    {{ Breadcrumbs::render('backend.collection.edit', $element) }}
@endsection

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="portlet box blue">
                @include('backend.partials.forms.form_title',['title' => trans('general.edit_collection')])
                <div class="portlet-body">
                    @include('backend.partials._admin_instructions',['title' => trans('general.collections') ,'message' =>trans('message.edit_collection')])
                    <div class="portlet-body form">
                        <form class="horizontal-form" role="form" method="POST"
                              action="{{ route('backend.collection.update', $element) }}" enctype="multipart/form-data">
                            @csrf
                            @method('put')
                            <div class="form-body">
                                <h3 class="form-section">{{ trans('general.edit_collection') }}</h3>
                                <br>
                                {{--name arabic / name english --}}
                                <div class="portlet box blue-dark">
                                    <div class="portlet-title">
                                        <div class="caption">
                                            <i class="fa fa-gift"></i> {{ trans('general.main_details') }}
                                        </div>
                                    </div>
                                    <div class="portlet-body form">
                                        <div class="form-body">
                                            <div class="row">
                                                <div class="col-lg-12">
                                                    <div class="col-md-4">
                                                        <div class="form-group {{ $errors->has('name') ? ' has-error' : '' }}">
                                                            <label for="name"
                                                                   class="control-label">{{ trans('general.name') }}
                                                                *</label>
                                                            <input id="name" type="text" class="form-control tooltips"
                                                                   data-container="body" data-placement="top"
                                                                   data-original-title="{{ trans('message.name') }}"
                                                                   name="name" value="{{ $element->name }}"
                                                                   placeholder="{{ trans('general.name') }}" required
                                                                   autofocus>
                                                            @if ($errors->has('name'))
                                                                <span class="help-block">
                                                <strong>
                                                    {{ $errors->first('name') }}
                                                </strong>
                                            </span>
                                                            @endif
                                                            {{-- <span class="help-block">
                                                                                                                                <strong>{{ trans('message.sku') }}</strong>
                                                            </span> --}}
                                                        </div>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <div class="form-group {{ $errors->has('slug_ar') ? ' has-error' : '' }}">
                                                            <label for="slug_ar"
                                                                   class="control-label">{{ trans('general.slug_arabic') }}
                                                                *</label>
                                                            <input id="slug_ar" type="text"
                                                                   class="form-control tooltips" data-container="body"
                                                                   data-placement="top"
                                                                   data-original-title="{{ trans('message.slug_ar') }}"
                                                                   name="slug_ar" value="{{ $element->slug_ar }}"
                                                                   placeholder="{{ trans('general.slug_arabic') }}"
                                                                   required autofocus>
                                                            @if ($errors->has('slug_ar'))
                                                                <span class="help-block">
                                                <strong>
                                                    {{ $errors->first('slug_ar') }}
                                                </strong>
                                            </span>
                                                            @endif
                                                            {{-- <span class="help-block">
                                                                                                                                <strong>{{ trans('message.name_ar') }}</strong>
                                                            </span> --}}
                                                        </div>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <div class="form-group{{ $errors->has('slug_en') ? ' has-error' : '' }}">
                                                            <label for="slug_en"
                                                                   class="control-label">{{ trans('general.slug_english') }}
                                                                *</label>
                                                            <input id="slug_en" type="text"
                                                                   class="form-control tooltips" data-container="body"
                                                                   data-placement="top"
                                                                   data-original-title="{{ trans('message.slug_en') }}"
                                                                   name="slug_en" value="{{ $element->slug_en }}"
                                                                   placeholder="{{ trans('general.slug_english') }}"
                                                                   required autofocus>
                                                            @if ($errors->has('slug_en'))
                                                                <span class="help-block">
                                                <strong>
                                                    {{ $errors->first('slug_en') }}
                                                </strong>
                                            </span>
                                                            @endif
                                                            {{-- <span class="help-block">
                                                                                                                                <strong>{{ trans('message.name_en') }}</strong>
                                                            </span> --}}
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-lg-12">
                                                    @can('isAdminOrAbove')
                                                        <div class="col-md-3">
                                                            <div class="form-group">
                                                                <label for="single"
                                                                       class="control-label">{{ trans('general.owner') }}
                                                                    *</label>
                                                                <select name="user_id" class="form-control tooltips"
                                                                        data-container="body" data-placement="top"
                                                                        data-original-title="{{ trans('message.owner') }}">
                                                                    <option value="">{{ trans('general.choose_user') }}</option>
                                                                    @foreach($users as $user)
                                                                        <option value="{{ $user->id }}" {{ $element->user_id === $user->id ? 'selected' : null  }}>{{ $user->slug }}</option>
                                                                    @endforeach
                                                                </select>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-3">
                                                            <div class="form-group">
                                                                <label class="control-label sbold tooltips"
                                                                       data-container="body" data-placement="top"
                                                                       data-original-title="{{ trans('message.active') }}">{{ trans('general.active') }}</label></br>
                                                                <label class="radio-inline">
                                                                    <input type="radio" name="active"
                                                                           id="optionsRadios3"
                                                                           value="1">
                                                                    {{ trans('general.yes') }}</label>
                                                                <label class="radio-inline">
                                                                    <input type="radio" name="active"
                                                                           id="optionsRadios4"
                                                                           checked value="0">
                                                                    {{ trans('general.no') }}</label>
                                                            </div>

                                                        </div>
                                                        <div class="col-md-3">
                                                            <div class="form-group">
                                                                <label class="control-label sbold tooltips"
                                                                       data-container="body" data-placement="top"
                                                                       data-original-title="{{ trans('message.on_home') }}">{{ trans('general.on_home') }}</label></br>
                                                                <label class="radio-inline">
                                                                    <input type="radio" name="on_home"
                                                                           id="optionsRadios3"
                                                                           value="1" {{ $element->on_home ? 'checked' : null  }}>
                                                                    {{ trans('general.yes') }}</label>
                                                                <label class="radio-inline">
                                                                    <input type="radio" name="on_home"
                                                                           id="optionsRadios4"
                                                                           value="0" {{ !$element->on_home ? 'checked' : null  }}>
                                                                    {{ trans('general.no') }}</label>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-3">
                                                            <div class="form-group{{ $errors->has('order') ? ' has-error' : '' }}">
                                                                <label for="order"
                                                                       class="control-label sbold tooltips">{{ trans('general.sequence') }}
                                                                    *</label>
                                                                <input id="order" type="number" class="form-control"
                                                                       name="order"
                                                                       value="{{ $element->order }}"
                                                                       placeholder="{{ trans('general.sequence') }}"
                                                                       maxlength="2"
                                                                       autofocus>
                                                                @if ($errors->has('order'))
                                                                    <span class="help-block">
                                                                        <strong>
                                                                            {{ $errors->first('order') }}
                                                                        </strong>
                                                                    </span>
                                                                @endif
                                                            </div>
                                                        </div>
                                                    @else
                                                        <input type="hidden" name="active" value="{{ $element->active }}">
                                                        <input type="hidden" name="on_home" value="{{ $element->on_home }}">
                                                        <input type="hidden" name="user_id" value="{{ auth()->id()}}">
                                                    @endcan
                                                </div>
                                                <div class="col-lg-12">
                                                    @if(!$products->isEmpty())
                                                        <div class="col-md-4">
                                                            <div class="form-group">
                                                                <label class="control-label">{{ trans('general.$products') }}
                                                                    *</label>
                                                                <select multiple="multiple" class="multi-select"
                                                                        id="my_multi_select1" name="products[]">
                                                                    @foreach($products as $product)
                                                                        <option value="{{ $product->id }}" {{ in_array($product->id,$element->products->pluck('id')->unique()->flatten()->toArray()) ? 'selected' : null }}>
                                                                            {{ $product->name }} - SKU
                                                                            : {{ $product->sku }}</option>
                                                                    @endforeach
                                                                </select>
                                                            </div>
                                                        </div>
                                                    @endif
                                                    <div class="col-md-4">
                                                        <div class="form-group">
                                                            <label for="file"
                                                                   class="control-label">{{ trans('general.main_image') }}
                                                                *</label>

                                                            <input class="form-control tooltips" data-container="body"
                                                                   data-placement="top"
                                                                   data-original-title="{{ trans('message.main_image') }}"
                                                                   name="image" placeholder="images" type="file"
                                                                   />
                                                            <div class="help-block text-left">
                                                                {{ trans('message.best_fit',['width' => '1080 px', 'height' => '1440']) }}
                                                            </div>
                                                        </div>
                                                    </div>
                                                        @if($element->image)
                                                            <div class="col-md-3">
                                                                <img class="img-responsive img-sm"
                                                                     src="{{ $element->imageThumbLink }}"
                                                                     alt="">
                                                                <a href="{{ route("backend.admin.image.clear",['model' => 'collection', 'id' => $element->id ]) }}"><i
                                                                            class="fa fa-fw fa-times"></i></a>
                                                            </div>
                                                        @endif
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="form-actions right">
                                {{--<button type="button" class="btn default">Cancel</button>--}}
                                <a href="{!! url()->previous() !!}"
                                   class="btn btn-danger">{{ trans('general.cancel') }}</a>
                                <button type="submit" class="btn btn-warning">
                                    <i class="fa fa-check"></i> {{ trans('general.save_and_go_back') }}
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection


@section('scripts')
    @parent
    <script src="{{ mix('js/datepicker.js') }}"></script>
@endsection