<div class="tt-product thumbprod-center" style="padding: 10px;">
    <div class="tt-image-box">
        {{--        @auth--}}
        {{--            <a href="{{ route('frontend.favorite.product.add', $element->id) }}" class="tt-btn-wishlist {{ $element->isFavorited ? 'active' : null }}"--}}
        {{--               data-tooltip="{{ trans('general.add_to_wish_list') }}"--}}
        {{--               data-tposition="{{ app()->isLocale('ar') ? 'right' : 'left' }}"--}}
        {{--            ></a>--}}
        {{--        @endauth--}}
        {{--<a href="#" class="tt-btn-compare" data-tooltip="Add to Compare"--}}
        {{--data-tposition="{{ app()->isLocale('ar') ? 'right' : 'left' }}"--}}
        {{--></a>--}}
        <a href="{{ route('frontend.collection.show', $element->id) }}">
            <span class="tt-img">
                <img class="img-responsive" src="{{ $element->imageThumbLink }}" alt="{{ $element->description }}">
            </span>
        </a>
    </div>
    <div class="tt-description text-center">
        <div class="tt-row">
            <ul class="tt-add-info">
                <li>
                    <a href="{{ route('frontend.user.show.name',['id' => $element->user->id, 'name' => $element->user->name]) }}">
{{--                        {{ isset($title) ? $title  : null }} :--}}
                        {{ str_limit($element->user->slug,20) }}</a>
                </li>
                <li>
                    <a href="{{ route('frontend.collection.show',$element->id) }}">{{ str_limit($element->name,25,'..') }}</a>
                </li>
            </ul>
            {{--@include('frontend.wokiee.four.partials._rating')--}}
        </div>
{{--        <h2 class="tt-title">--}}
{{--            <a href="{{ route('frontend.product.show.name',['id' => $element->id , 'name' => $element->name]) }}">{{ str_limit($element->name,35,'..') }}</a>--}}
{{--        </h2>--}}
        <div class="tt-product-inside-hover text-center">
            <br>
            <div class="tt-row-btn">
                <a href="{{ route('frontend.collection.show', $element->id) }}"
                   class="btn btn-small">{{ trans('general.view_details') }}</a>
            </div>
        </div>
    </div>
</div>
