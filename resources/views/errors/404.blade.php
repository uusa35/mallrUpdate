@extends('frontend.wokiee.four.layouts.app')

@section('body')
    <div class="title"></div>
    <div id="tt-pageContent">
        <div class="tt-offset-0 container-indent">
            <div class="tt-page404">
                <h1 class="tt-title">{{ $exception->getMessage() }}</h1>
                <a href="{{ route('frontend.home') }}" class="btn">{{ trans('general.home') }}</a>
            </div>
        </div>
    </div>
@endsection
