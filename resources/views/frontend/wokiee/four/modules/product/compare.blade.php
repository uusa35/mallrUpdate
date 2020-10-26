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
                                            <a href="{{ route('frontend.product.compare.remove', $element->rowId) }}"
                                               class="tt-remove-item js-remove-item"></a>
                                        </div>
                                    </div>
                                    <div class="tt-img">
                                        <a href="{{ route('frontend.product.show.name',['id' => $element->id, 'name' => $element->options->element->name]) }}"><img
                                                    style="margin-left: auto; margin-right: auto;"
                                                    src="{{ $element->options->element->imageThumbLink }}"
                                                    alt="{{ $element->options->element->name }}"></a>
                                    </div>
                                    <h2 class="tt-title text-center"><a
                                                href="{{ route('frontend.product.show.name',['id' => $element->id, 'name' => $element->options->element->name]) }}">{{ $element->options->element->name }}</a>
                                    </h2>
                                    <div class="tt-price text-center">
                                        @if($element->isOnSale)
                                            <span class="new-price ">{{ $element->options->element->convertedSalePrice}} {{ $currency->symbol }}</span>
                                            <span class="old-price ">{{ $element->options->element->convertedPrice }} {{ $currency->symbol }}</span>
                                        @else
                                            <span class="new-price col-12">{{ $element->options->element->convertedPrice }} {{ $currency->symbol }}</span>
                                        @endif
                                    </div>
                                </div>
                                <div class="tt-col tt-table-title">{{ trans('general.description') }}</div>
                                <div class="tt-col js-description text-center">
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
                                            <a class="options-color"
                                               style="background-color: {{ $color->code }}; padding: 10px; margin-right: 10px; margin-left: 10px;"
                                               href="{{ route('frontend.product.show.name', ['id' => $element->options->element->id, 'name' => $element->options->element->name]) }}">{{ $color->name }}</a>
                                        @endforeach
                                    </div>
                                    <div class="tt-col tt-table-title">{{ trans('general.sizes') }}</div>
                                    <div class="tt-col">
                                        @foreach($element->options->element->product_attributes->pluck('size')->unique('id')->take(2) as $size)
                                            <span class="options-color"
                                                  href="{{ route('frontend.product.show.name', ['id' => $element->options->element->id, 'name' => $element->options->element->name]) }}">
                                                    <b>{{ $size->name }},</b>
                                                </span>
                                        @endforeach
                                    </div>
                                @elseif($element->options->element->color || $element->options->element->size)
                                    <div class="tt-col tt-table-title">{{ trans('general.color') }}</div>
                                    <div class="tt-col">
                                        <span class="options-color"
                                              style="background-color: {{ $element->options->element->color->code }}; padding: 10px; margin-right: 10px; margin-left: 10px;"
                                              href="{{ route('frontend.product.show.name', ['id' => $element->options->element->id, 'name' => $element->options->element->name]) }}">
                                                <b>{{ $element->options->element->color->name }}</b>
                                            </span>
                                    </div>
                                    @if($element->options->element->size)
                                        <div class="tt-col tt-table-title">{{ trans('general.size') }}</div>
                                        <div class="tt-col">
                                            <span class="options-color"
                                                  href="{{ route('frontend.product.show.name', ['id' => $element->options->element->id, 'name' => $element->options->element->name]) }}">
                                                    <b>{{ $element->options->element->size->name }},</b>
                                                </span>
                                        </div>
                                    @endif
                                @endif
                                <div class="tt-col text-center">
                                    <a href="{{ route('frontend.product.show.name', ['id' => $element->options->element->id, 'name' => $element->options->element->name]) }}"
                                       class="tt-btn-addtocart" data-toggle="modal"
                                       data-target="#modalAddToCartProduct"><i
                                                class="icon-f-39"></i>{{ trans('general.view_details') }}</a>
                                </div>
                            </div>
                        @endforeach
                    </div>
                @else
                    <div class="alert alert-default text-light text-center mt-5">
                        <h3 class="mt-3">{{ trans('general.no_products') }}</h3>
                    </div>
                @endif
            </div>
        </div>
@endsection
