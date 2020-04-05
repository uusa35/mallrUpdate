@extends('frontend.wokiee.four.layouts.app')

@section('breadcrumbs')
    {{--@include('frontend.wokiee.four.partials.breadcrumbs')--}}
    {{ Breadcrumbs::render('password.email') }}
@endsection
@section('body')
    <div class="container-indent">
        <div class="container">
            <h1 class="tt-title-subpages noborder">{{ trans('general.already_registered') }}</h1>
            <div class="tt-login-form">
                <div class="row">
                    <div class="col-xs-12 col-md-6">
                        <div class="tt-item">
                            <h2 class="tt-title">{{ trans('general.forget_password') }}</h2>
                            <p>
                            @if (session('status'))
                                <div class="alert alert-success" role="alert">
                                    {{ session('status') }}
                                </div>
                                @endif
                            </p>
                            <div class="form-default form-top">
                                <form method="POST" action="{{ route('password.email') }}">
                                    @csrf
                                    <div class="form-group">
                                        <label for="email">{{ trans('general.email') }}*</label>
                                        <input id="email" type="email"
                                               class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}"
                                               name="email" value="{{ old('email') }}" required>
                                        @if ($errors->has('email'))
                                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                        @endif
                                    </div>

                                    <div class="row">
                                        <div class="col-auto">
                                            <div class="form-group">
                                                <button class="btn btn-border"
                                                        type="submit">{{ trans('general.forget_password') }}</button>
                                            </div>
                                        </div>
                                        <div class="col-auto align-self-center">
                                            <div class="form-group">
                                                <ul class="additional-links">
                                                    <li>or
                                                        <a href="{{ route('frontend.home') }}">{{ trans('general.return_home') }}</a>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    <div class="col-xs-12 {{ env('ABATI') ? 'd-none' : 'col-md-6' }}">
                        <div class="tt-item">
                            <h2 class="tt-title">{{ trans('general.new_user') }}</h2>
                            <p>
                                {{ trans('message.new_user') }}
                            </p>
                            <div class="form-group">
                                <a href="{{ route('register') }}"
                                   class="btn btn-top btn-border">{{ trans('general.create_an_account') }}</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
