@extends('frontend.wokiee.four.layouts.app')

@section('breadcrumbs')
    {{ Breadcrumbs::render('frontend.collection.index') }}
@endsection

@section('body')
    <div class="container-indent">
        <!-- mobile product slider  -->
        <!-- /mobile product slider  -->
        <div class="container  container-fluid-mobile">
            <div class="row">
                @foreach($elements as $element)
                    <div class="col-lg-3 col-sm-12">
                        @include('frontend.wokiee.four.partials._collection_widget_cover')
                    </div>
                @endforeach
                <div class="col-12">
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
@endsection

