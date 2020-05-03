@extends('frontend.wokiee.four.layouts.app')

@section('breadcrumbs')
    {{ Breadcrumbs::render('frontend.fan.index') }}
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
                                @if(isset($elements) && $elements->isNotEmpty())
                                    @foreach($elements as $element)
                                        <div class="col-lg-4 col-md-6">
                                            <div class="tt-product thumbprod-center" style="padding: 10px;">
                                                <div class="tt-image-box">
                                                        <span class="tt-img"><img class="img-responsive" src="{{ $element->imageThumbLink }}" alt="{{ $element->description }}"></span>
                                                    @if($element->images->isNotEmpty())
                                                        <span class="tt-img-roll-over"><img src="{{ $element->images->first()->imageThumbLink }}" alt="{{ $element->description }}"></span>
                                                    @endif
                                                </div>
                                                <div class="tt-description text-center">
                                                    <div class="tt-row">
                                                        <ul class="tt-add-info">
                                                            <li>
                                                                <a href="{{ route('frontend.user.show',$element->id) }}">{{ str_limit($element->name,60,'..') }}</a>
                                                            </li>
                                                        </ul>
                                                        {{--@include('frontend.wokiee.four.partials._rating')--}}
                                                    </div>
                                                    @if($element->caption)
                                                        <h2 class="tt-title">
                                                            <a href="{{ route('frontend.user.show',$element->id) }}">{{ str_limit($element->name,35,'..') }}</a>
                                                        </h2>
                                                    @endif
                                                    {{--    @include('frontend.wokiee.four.partials._widget_price_and_color')--}}
                                                    <div class="tt-product-inside-hover text-center">

                                                        <div class="tt-row-btn">
                                                                <a href="{{ route('frontend.user.show', $element->id) }}"
                                                                   class="btn btn-small">{{ trans('general.view_details') }}</a>
                                                                {{--                <a href="{{ route('frontend.category.show', $element->id) }}"--}}
                                                                {{--                   class="btn btn-small">{{ trans('general.view_companies') }}</a>--}}
                                                        </div>
                                                        <div class="tt-row-btn">
                                                            {{--            @include('frontend.wokiee.four.partials._quick_view_product_btn')--}}
                                                            {{--            @auth--}}
                                                            {{--                <a href="#" class="tt-btn-wishlist"></a>--}}
                                                            {{--            @endauth--}}
                                                            {{--<a href="#" class="tt-btn-compare"></a>--}}
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                @endif
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
