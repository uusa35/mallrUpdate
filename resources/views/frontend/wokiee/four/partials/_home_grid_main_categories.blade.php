<div class="container-fluid-custom">
    <h1 class="tt-title-subpages noborder">{{ trans('general.categories') }}</h1>
    <div class="tt-portfolio-masonry">
        <div class="tt-filter-nav">
            <div class="button active" data-filter="*">{{ trans('general.all') }}</div>
            @foreach($categories->where('is_product',true)->where('on_home', true)->take(6) as $cat)
                <div class="button" data-filter=".sort-value-{!! $cat->id !!}">{{ $cat->name }}</div>
            @endforeach
        </div>
        <div class="tt-portfolio-content layout-default tt-grid-col-3  tt-add-item">
            @foreach($categories->where('is_product',true)->where('on_home', true)->take(3) as $cat)
                <div class="element-item sort-value-{!! $cat->id !!}">
                    <figure>
                        <img src="{{ $cat->getImageThumbLinkAttribute() }}" alt="{{ $cat->name }}">
                        <figcaption>
                            <h6 class="tt-title">
                                <a href="{{ route('frontend.product.search',['product_category_id' => $cat->id]) }}">{{ str_limit($cat->name,20,'') }}</a>
                            </h6>
                            @if($cat->description)
                                <p>
                                    {!! str_limit($cat->description,50) !!}
                                </p>
                            @endif
                            <a href="{{ $cat->getImageLargeLinkAttribute() }}" class="tt-btn-zomm"></a>
                        </figcaption>
                    </figure>
                </div>
            @endforeach
        </div>
        {{--        <div class="text-center isotop_showmore_js">--}}
        {{--            <a href="#" class="btn btn-border">LOAD MORE</a>--}}
        {{--        </div>--}}
    </div>
</div>
