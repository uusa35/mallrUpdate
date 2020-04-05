@extends('frontend.wokiee.four.layouts.app')

@section('breadcrumbs')
    {{ Breadcrumbs::render('frontend.product.show',$element) }}
@endsection

@section('body')
    <div class="container-indent">
        <!-- mobile product slider  -->
    @include('frontend.wokiee.four.partials._service_show_gallery_mobile')
    <!-- /mobile product slider  -->
        <div class="container  container-fluid-mobile">
            <div class="row">
                <div class="col-12">
                    <div class="overflowed">
                        <form action="{{ route('web.payment.create') }}" method="post">
                            @csrf
                            <input type="hidden" name="id" value="{{ $order->id }}">
                            <input type="hidden" name="id" value="{{ auth()->user()->id }}">
                            <button type="submit" class="btn btn-theme btn-theme-dark">{{ trans('general.go_to_payment') }}</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

