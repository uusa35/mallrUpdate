@extends('frontend.wokiee.four.layouts.app')

@section('breadcrumbs')
    {{ Breadcrumbs::render('frontend.favorite.index') }}
@endsection

@section('body')
    <div class="container-indent nomargin">
        <div class="container-indent">
            <div class="container">
                <div class="row" style="padding-top: 20px;">
                    <div class="col-lg-12">
                        <div class="content-indent">
                            <div class="tt-product-listing row">
                                @foreach($products as $element)
                                    <div class="col-lg-4">
                                        @include('frontend.wokiee.four.partials._product_widget')
                                    </div>
                                @endforeach
                            </div>
                            <div class="tt-product-listing row">
                                @foreach($services as $element)
                                    <div class="col-lg-4">
                                        @include('frontend.wokiee.four.partials._service_widget')
                                    </div>
                                @endforeach
                            </div>
                            <div class="text-center tt_product_showmore">
                                <div class="col-lg-12">
                                    @include('frontend.wokiee.four.partials._pagination',['elements' => $products])
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection