<form class="form-horizontal" role="form" method="POST" action="{{ route('backend.user.store') }}"
      enctype="multipart/form-data">
    {{ csrf_field() }}
    <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
        <label for="name" class="col-md-4 control-label">Username*</label>

        <div class="col-md-6">
            <input id="name" type="text" class="form-control" name="name"
                   value="{{ old('name') }}" required autofocus>

            @if ($errors->has('name'))
                <span class="help-block">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
            @endif
        </div>
    </div>

    <div class="form-group{{ $errors->has('mobile') ? ' has-error' : '' }}">
        <label for="mobile" class="col-md-4 control-label">Mobile*</label>
        <div class="col-md-6">
            <input id="mobile"
                   type="text"
                   value="{{ old('mobile') }}"
                   class="form-control"
                   name="mobile"
                   placeholder="99 999 999"
                   required autofocus>
            <span class="help-block">
                (no country code)
            </span>
            @if ($errors->has('mobile'))
                <span class="help-block">
                    <strong>
                        {{ $errors->first('mobile') }}
                    </strong>
                </span>
            @endif
        </div>
    </div>

    <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
        <label for="mobile" class="col-md-4 control-label">Password*</label>
        <div class="col-md-6">
            <input id="password"
                   type="text"
                   class="form-control"
                   name="password"
                   placeholder="99 999 999"
                   required autofocus>
            <span class="help-block">
                (no country code)
            </span>
            @if ($errors->has('mobile'))
                <span class="help-block">
                    <strong>
                        {{ $errors->first('password') }}
                    </strong>
                </span>
            @endif
        </div>
    </div>

    <div class="form-group{{ $errors->has('password_confirmation') ? ' has-error' : '' }}">
        <label for="mobile" class="col-md-4 control-label">password_confirmation*</label>
        <div class="col-md-6">
            <input id="password_confirmation"
                   type="text"
                   class="form-control"
                   name="password_confirmation"
                   placeholder="99 999 999"
                   required autofocus>
            <span class="help-block">
                (no country code)
            </span>
            @if ($errors->has('mobile'))
                <span class="help-block">
                    <strong>
                        {{ $errors->first('password_confirmation') }}
                    </strong>
                </span>
            @endif
        </div>
    </div>

    <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
        <label for="mobile" class="col-md-4 control-label">Email*</label>
        <div class="col-md-6">
            <input id="email"
                   type="text"
                   class="form-control"
                   name="email"
                   value="{{ old('email') }}"
                   placeholder="99 999 999"
                   required autofocus>
            @if ($errors->has('email'))
                <span class="help-block">
                    <strong>
                        {{ $errors->first('email') }}
                    </strong>
                </span>
            @endif
        </div>
    </div>

    <div class="form-group{{ $errors->has('phone') ? ' has-error' : '' }}">
        <label for="phone" class="col-md-4 control-label">Phone</label>
        <div class="col-md-6">
            <input id="phone"
                   type="text"
                   class="form-control"
                   name="phone"
                   value="{{ old('phone') }}"
                   >
            @if ($errors->has('phone'))
                <span class="help-block">
                    <strong>
                        {{ $errors->first('phone') }}
                    </strong>
                </span>
            @endif
        </div>
    </div>

    <div class="form-group{{ $errors->has('whatsapp') ? ' has-error' : '' }}">
        <label for="whatsapp" class="col-md-4 control-label">whatsapp</label>
        <div class="col-md-6">
            <input id="whatsapp"
                   type="text"
                   class="form-control"
                   name="whatsapp"
                   value="{{ old("whatsapp") }}"
                   >
            @if ($errors->has('whatsapp'))
                <span class="help-block">
                    <strong>
                        {{ $errors->first('whatsapp') }}
                    </strong>
                </span>
            @endif
        </div>
    </div>

    <div class="form-group{{ $errors->has('fax') ? ' has-error' : '' }}">
        <label for="fax" class="col-md-4 control-label">fax</label>
        <div class="col-md-6">
            <input id="fax"
                   type="text"
                   class="form-control"
                   name="fax"
                   value="{{ old('fax') }}"
                   >
            @if ($errors->has('fax'))
                <span class="help-block">
                    <strong>
                        {{ $errors->first('fax') }}
                    </strong>
                </span>
            @endif
        </div>
    </div>

    <div class="form-group{{ $errors->has('address') ? ' has-error' : '' }}">
        <label for="address" class="col-md-4 control-label">address arabic*</label>
        <div class="col-md-6">
            <input id="address_ar"
                   type="text"
                   class="form-control"
                   name="address_ar"
                   value="{{ old('address_ar') }}"
                   >
            @if ($errors->has('address_ar'))
                <span class="help-block">
                    <strong>
                        {{ $errors->first('address_ar') }}
                    </strong>
                </span>
            @endif
        </div>
    </div>

    <div class="form-group{{ $errors->has('address') ? ' has-error' : '' }}">
        <label for="address" class="col-md-4 control-label">address english*</label>
        <div class="col-md-6">
            <input id="address_en"
                   type="text"
                   class="form-control"
                   name="address_en"
                   value="{{ old('address_en') }}"
                   >
            @if ($errors->has('address_en'))
                <span class="help-block">
                    <strong>
                        {{ $errors->first('address_en') }}
                    </strong>
                </span>
            @endif
        </div>
    </div>


    <div class="form-group{{ $errors->has('logo') ? ' has-error' : '' }}">
        <label for="logo" class="col-md-4 control-label">logo*</label>
        <div class="col-md-3">
            <input id="logo" type="file" class="form-control" name="logo">
            @if ($errors->has('logo'))
                <span class="help-block"><strong>{{ $errors->first('logo') }}</strong></span>
            @endif
            <div class="help-block text-left">
                W * H - Best fit 500 x 500 pixels
            </div>
        </div>
    </div>

    <div class="form-group{{ $errors->has('image_1') ? ' has-error' : '' }}">
        <label for="image_1" class="col-md-4 control-label">image_1</label>
        <div class="col-md-3">
            <input id="image_1" type="file" class="form-control" name="image_1">
            @if ($errors->has('image_1'))
                <span class="help-block"><strong>{{ $errors->first('image_1') }}</strong></span>
            @endif
            <div class="help-block text-left">
                H * W - Best fit ['1534', '586'] pixels
            </div>
        </div>
    </div>

    <div class="form-group{{ $errors->has('image_2') ? ' has-error' : '' }}">
        <label for="image_2" class="col-md-4 control-label">image_2</label>
        <div class="col-md-3">
            <input id="image_2" type="file" class="form-control" name="image_2">
            @if ($errors->has('image_2'))
                <span class="help-block"><strong>{{ $errors->first('image_2') }}</strong></span>
            @endif
            <div class="help-block text-left">
                H * W - Best fit ['1534', '586'] pixels
            </div>
        </div>
    </div>


    <div class="form-group{{ $errors->has('image_3') ? ' has-error' : '' }}">
        <label for="image_3" class="col-md-4 control-label">image_3</label>
        <div class="col-md-3">
            <input id="image_3" type="file" class="form-control" name="image_3">
            @if ($errors->has('image_3'))
                <span class="help-block"><strong>{{ $errors->first('image_3') }}</strong></span>
            @endif
            <div class="help-block text-left">
                H * W - Best fit ['1534', '586'] pixels
            </div>
        </div>
    </div>

    <div class="form-group{{ $errors->has('image_4') ? ' has-error' : '' }}">
        <label for="image_4" class="col-md-4 control-label">image_4</label>
        <div class="col-md-3">
            <input id="image_4" type="file" class="form-control" name="image_4">
            @if ($errors->has('image_4'))
                <span class="help-block"><strong>{{ $errors->first('image_4') }}</strong></span>
            @endif
            <div class="help-block text-left">
                H * W - Best fit ['1534', '586'] pixels
            </div>
        </div>
    </div>

    <div class="form-group{{ $errors->has('image_5') ? ' has-error' : '' }}">
        <label for="image_5" class="col-md-4 control-label">image_5</label>
        <div class="col-md-3">
            <input id="image_5" type="file" class="form-control" name="image_5">
            @if ($errors->has('image_5'))
                <span class="help-block"><strong>{{ $errors->first('image_5') }}</strong></span>
            @endif
            <div class="help-block text-left">
                H * W - Best fit ['1534', '586'] pixels
            </div>
        </div>
    </div>

    <div class="form-group">
        <label for="role_id" class="col-md-4 control-label">Account Type*</label>

        <div class="col-md-6">
            <select name="role_id" id="role_id" class="form-control" required>
                @foreach($roles as $role)
                    <option value="{{ $role->id }}">{{ $role->name }}</option>
                @endforeach
            </select>
        </div>
    </div>

    <div class="form-group">
        <label class="col-md-4 control-label" for="price">Category*</label>
        <div class="col-md-6">
            <select name="category_id" id="category" class="form-control" required>
                @foreach($categories as $parent)
                    <option  value="{{ $parent->id }}">{{ $parent->name }}</option>
                @endforeach
            </select>
        </div>
    </div>

    <div class="form-group">
        <label class="col-md-4 control-label" for="country_id">Country*</label>
        <div class="col-md-6">
            <select name="country_id" id="country" class="form-control" required>
                @foreach($countries as $country)
                    <option value="{{ $country->id }}">{{ $country->name }}</option>
                @endforeach
            </select>
        </div>
    </div>



    <div class="form-group">
        <label for="longitude" class="col-md-4 control-label">longitude</label>
        <div class="col-md-6">
            <input id="longitude" type="text" class="form-control" name="longitude"
                    autofocus>
        </div>
    </div>

    <div class="form-group">
        <label for="latitude" class="col-md-4 control-label">latitude</label>
        <div class="col-md-6">
            <input id="latitude" type="text" class="form-control" name="latitude"
                    autofocus>
        </div>
    </div>

    <div class="form-group">
        <label for="keywords" class="col-md-4 control-label">keywords</label>
        <div class="col-md-6">
            <input id="keywords" type="text" class="form-control" name="keywords"
                    autofocus>
        </div>
    </div>

    <div class="form-group">
        <label for="site_url" class="col-md-4 control-label">site_url</label>
        <div class="col-md-6">
            <input id="site_url" type="text" class="form-control" name="site_url"
                    autofocus>
        </div>
    </div>

    <div class="form-group">
        <label for="google_map_url" class="col-md-4 control-label">google_map_url</label>
        <div class="col-md-6">
            <input id="google_map_url" type="text" class="form-control" name="google_map_url"
                    autofocus>
        </div>
    </div>

    <div class="form-group">
        <label for="verification_code" class="col-md-4 control-label">verification_code</label>
        <div class="col-md-6">
            <input id="verification_code" type="text" class="form-control" name="verification_code"
                    autofocus>
        </div>
    </div>

    <div class="form-group">
        <label for="description" class="col-md-4 control-label">description</label>
        <div class="col-md-6">
            <textarea type="text" class="form-control" name="description" aria-multiline="true"
                      maxlength="500">
            </textarea>
        </div>
    </div>

    <div class="form-group">
        <label for="services" class="col-md-4 control-label">services</label>
        <div class="col-md-6">
            <textarea type="text" class="form-control" name="services" aria-multiline="true"
                      maxlength="500">
            </textarea>
        </div>
    </div>


    <div class="col-lg-12">
        <div class="col-lg-6 col-lg-push-4">
            <div class="form-body">
                <div class="md-radio-inline">
                    <div class="md-radio">
                        <input type="radio" id="radio53" name="active" value="1"
                               class="md-radiobtn">
                        <label for="radio53">
                            <span></span>
                            <span class="check"></span>
                            <span class="box"></span>Active</label>
                    </div>
                    <div class="md-radio">
                        <input type="radio" id="radio54" name="active" value="0"
                               class="md-radiobtn" checked>
                        <label for="radio54">
                            <span></span>
                            <span class="check"></span>
                            <span class="box"></span> N/A</label>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="col-lg-12">
        <div class="col-lg-6 col-lg-push-4">
            <div class="form-body">
                <div class="md-radio-inline">
                    <div class="md-radio">
                        <input type="radio" id="radio55" name="is_home" value="1"
                               class="md-radiobtn">
                        <label for="radio55">
                            <span></span>
                            <span class="check"></span>
                            <span class="box"></span> is_home</label>
                    </div>
                    <div class="md-radio">
                        <input type="radio" id="radio56" name="is_home" value="0"
                               class="md-radiobtn" checked>
                        <label for="radio56">
                            <span></span>
                            <span class="check"></span>
                            <span class="box"></span> N/A</label>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="col-lg-12">
        <div class="col-lg-6 col-lg-push-4">
            <div class="form-body">
                <div class="md-radio-inline">
                    <div class="md-radio">
                        <input type="radio" id="radio57" name="show_offer" value="1"
                               class="md-radiobtn">
                        <label for="radio57">
                            <span></span>
                            <span class="check"></span>
                            <span class="box"></span> show_offer</label>
                    </div>
                    <div class="md-radio">
                        <input type="radio" id="radio58" name="show_offer" value="0"
                               class="md-radiobtn" checked>
                        <label for="radio58">
                            <span></span>
                            <span class="check"></span>
                            <span class="box"></span> N/A</label>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="col-lg-12">
        <div class="col-lg-6 col-lg-push-4">
            <div class="form-body">
                <div class="md-radio-inline">
                    <div class="md-radio">
                        <input type="radio" id="radio59" name="verified" value="1"
                               class="md-radiobtn">
                        <label for="radio59">
                            <span></span>
                            <span class="check"></span>
                            <span class="box"></span> verified</label>
                    </div>
                    <div class="md-radio">
                        <input type="radio" id="radio60" name="verified" value="0"
                               class="md-radiobtn" checked>
                        <label for="radio60">
                            <span></span>
                            <span class="check"></span>
                            <span class="box"></span> N/A</label>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <div class="col-lg-12">
        <div class="form-group">
            @include('backend.partials.forms._btn-group')
        </div>
    </div>

</form>



