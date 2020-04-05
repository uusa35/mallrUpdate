<div class="container">
    <h1 class="tt-title-subpages noborder">CREATE AN ACCOUNT</h1>
    <div class="tt-login-form">
        <div class="row justify-content-center">
            <div class="col-md-8 col-lg-6">
                <div class="tt-item">
                    <h2 class="tt-title">PERSONAL INFORMATION</h2>
                    <div class="form-default">
                        <form id="contactform" method="post" novalidate="novalidate">
                            <div class="form-group">
                                <label for="loginInputName">{{ trans('general.name') }} *</label>
                                <div class="tt-required">* {{ trans('general.required_fields') }}</div>
                                <input type="text" name="name" class="form-control" id="loginInputName"
                                       placeholder="{{ trans('general.name') }}">
                            </div>
                            <div class="form-group">
                                <label for="loginLastName">{{ trans('general.last_name') }} *</label>
                                <input type="text" name="lastName" class="form-control" id="loginLastName"
                                       placeholder="{{ trans('general.last_name') }}">
                            </div>
                            <div class="form-group">
                                <label for="loginInputEmail">{{ trans('general.email') }} *</label>
                                <input type="text" name="email" class="form-control" id="loginInputEmail"
                                       placeholder="{{ trans('general.email') }}">
                            </div>
                            <div class="form-group">
                                <label for="loginInputPassword">PASSWORD *</label>
                                <input type="text" name="passowrd" class="form-control" id="loginInputPassword"
                                       placeholder="Enter Password">
                            </div>
                            <div class="form-group">
                                <label for="address_country">{{ trans('general.country') }} <sup>*</sup></label>
                                <select id="address_country" class="form-control">
                                    @foreach($countries as $country)
                                        <option value="{{ $country->id }}" {{ getClientCountry()->id === $country->id ? 'selected' : null }}>{{ $country->slug }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="loginInputPassword">PASSWORD *</label>
                                <input type="text" name="passowrd" class="form-control" id="loginInputPassword"
                                       placeholder="Enter Password">
                            </div>
                            <div class="row">
                                <div class="col-auto">
                                    <div class="form-group">
                                        <button class="btn btn-border" type="submit">CREATE</button>
                                    </div>
                                </div>
                                <div class="col-auto align-self-center">
                                    <div class="form-group">
                                        <ul class="additional-links">
                                            <li>or <a href="#">Return to Store</a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>