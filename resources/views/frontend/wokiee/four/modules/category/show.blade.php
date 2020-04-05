@extends('frontend.wokiee.four.layouts.app')

@section('breadcrumbs')
    {{ Breadcrumbs::render('frontend.category.show', $element) }}
@endsection

@section('body')
    <div class="container-indent nomargin">
        {{--<div class="container-fluid-custom container-fluid-custom-mobile-padding">--}}
        <div class="container-indent">
            {{--<div class="container container-fluid-custom-mobile-padding">--}}
            <div class="container">
                <div class="row" style="padding-top: 20px;">
                    <div class="col-md-12">
                        <div class="content-indent">
                            </br>
                            <div class="tt-product-listing row">
                                @include('frontend.wokiee.four.partials._category_index_list',['elements' => $elements])
                            </div>
                            <div class="text-center tt_product_showmore">
                                <div class="col-lg-12">
                                    @include('frontend.wokiee.four.partials._pagination',['elements' => $elements])
                                </div>
                                {{--<a href="#" class="btn btn-border">LOAD MORE</a>--}}
                                {{--<div class="tt_item_all_js">--}}
                                {{--<a href="#" class="btn btn-border01">NO MORE ITEM TO SHOW</a>--}}
                                {{--</div>--}}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        {{--</div>--}}
        {{--</div>--}}
    </div>
@endsection