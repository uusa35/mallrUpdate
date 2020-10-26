@extends('frontend.wokiee.four.layouts.app')

@section('breadcrumbs')
    {{ Breadcrumbs::render('frontend.product.compare') }}
@endsection

@section('body')
    <div class="container-indent nomargin">
        {{--<div class="container-fluid-custom container-fluid-custom-mobile-padding">--}}
        <div class="container-indent">
            {{--<div class="container container-fluid-custom-mobile-padding">--}}
            <div class="container">
                @if(isset($elements) && $elements->content()->isNotEmpty())
                    <h1 class="tt-title-subpages noborder">{{ trans('general.compare_products') }}</h1>
                    <div class="tt-compare-table" id="tt-compare-table">
                        @foreach($elements->content() as $element)
                            <div class="tt-item">
                                <div class="tt-image-box">
                                    <div class="tt-row-custom">
                                        <div class="tt-col">
                                            <div class="tt-label-location">
                                                <div class="tt-label-our-stock">{{ trans('general.stock') }}</div>
                                            </div>
                                        </div>
                                        <div class="tt-col">
                                            <a href="#" class="tt-remove-item js-remove-item"></a>
                                        </div>
                                    </div>
                                    <div class="tt-img">
                                        <a href="{{ route('frontend.product.show.name',['id' => $element->id, 'name' => $element->name]) }}"><img
                                                    src="$element->options->element->imageThumbLink" alt=""></a>
                                    </div>
                                    <h2 class="tt-title"><a
                                                href="{{ route('frontend.product.show.name',['id' => $element->id, 'name' => $element->name]) }}">{{ $element->name }}</a>
                                    </h2>
                                    <div class="tt-price">
                                        @if($element->isOnSale)
                                            <span class="new-price">{{ $element->options->element->convertedSalePrice}}</span>
                                            <span class="old-price">{{ $element->options->element->convertedPrice }}</span>
                                        @else
                                            <span class="new-price">{{ $element->options->element->convertedPrice }}</span>
                                        @endif
                                    </div>
                                </div>
                                <div class="tt-col tt-table-title">{{ trans('general.description') }}</div>
                                <div class="tt-col js-description">
                                    {{ $element->options->element->description }}
                                </div>
                                <div class="tt-col tt-table-title">{{ trans('general.company') }}</div>
                                <div class="tt-col">
                                    {{ $element->options->element->user->slug }}
                                </div>
                                @if($element->options->element->product_attributes->isNotEmpty())
                                    <div class="tt-col tt-table-title">{{ trans('general.colors') }}</div>
                                    <div class="tt-col">
                                        @foreach($element->options->element->product_attributes->pluck('color')->unique('id') as $color)
                                            <li><a class="options-color" style="background-color: {{ $color->code }};"
                                                   href="{{ route('frontend.product.show.name', ['id' => $element->options->element->id, 'name' => $element->options->element->name]) }}"></a>
                                            </li>
                                        @endforeach
                                    </div>
                                    <div class="tt-col tt-table-title">{{ trans('general.sizes') }}</div>
                                    <div class="tt-col">
                                        @foreach($element->options->element->product_attributes->pluck('size')->unique('id')->take(2) as $size)
                                            <li>
                                                <a href="{{ route('frontend.product.show.name', ['id' => $element->options->element->id, 'name' => $element->options->element->name]) }}"
                                                   class="options-color-img"
                                                   data-src="{{ $element->options->element->imageThumbLink }}"
                                                   data-src-hover="images/product/product-03-05-hover.jpg"
                                                   data-tooltip="{{ strlen($size->name) > 2 ? $size->name : trans('general.size')  }}"
                                                   data-tposition="top">
                                                    <h6 style="color : lightgrey; padding-top: 5px">{{ strtoupper(substr($size->name,0,2)) }}</h6>
                                                </a>
                                            </li>
                                        @endforeach
                                    </div>
                                @elseif($element->options->element->color || $element->options->element->size)
                                    <div class="tt-col tt-table-title">{{ trans('general.color') }}</div>
                                    <div class="tt-col">
                                        <span class="options-color"
                                              style="background-color: {{ $element->options->element->color->code }}; padding: 10px;"
                                              href="{{ route('frontend.product.show.name', ['id' => $element->options->element->id, 'name' => $element->options->element->name]) }}">
                                                <b>{{ $element->options->element->color->name }}</b>
                                            </span>
                                    </div>
                                    @if($element->options->element->size)
                                        <div class="tt-col tt-table-title">{{ trans('general.size') }}</div>
                                        <div class="tt-col">
                                            <span class="options-color"
                                                  href="{{ route('frontend.product.show.name', ['id' => $element->options->element->id, 'name' => $element->options->element->name]) }}">
                                                    <b>{{ $element->options->element->size->name }}</b>
                                                </span>
                                        </div>
                                    @endif
                                    <div class="tt-col text-center">
                                        <a href="{{ route('frontend.product.show.name', ['id' => $element->options->element->id, 'name' => $element->options->element->name]) }}" class="tt-btn-addtocart" data-toggle="modal"
                                           data-target="#modalAddToCartProduct"><i class="icon-f-39"></i>{{ trans('general.view') }}</a>
                                    </div>
                            </div>
                            @endif
                    </div>
                    @endforeach
            </div>
            @else
                <div class="alert alert-info text-light text-center mt-5">
                    <h3 class="mt-3">No Products</h3>
                </div>
            @endif
        </div>
    </div>
    </div>
@endsection
