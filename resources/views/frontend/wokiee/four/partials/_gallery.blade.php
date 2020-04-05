@if($element->isNotEmpty())
    <div class="tt-portfolio-masonry">
        {{--    <div class="tt-filter-nav">--}}
        {{--        <div class="button active" data-filter="*">ALL</div>--}}
        {{--        <div class="button" data-filter=".sort-value-01">WOMEN</div>--}}
        {{--        <div class="button" data-filter=".sort-value-02">MEN </div>--}}
        {{--    </div>--}}
        <div class="tt-portfolio-content layout-default tt-grid-col-4  tt-add-item">
            @foreach($element as $image)
                <div class="element-item sort-value-02">
                    <figure>
                        <img src="{{ $image->imageThumbLink }}" alt="">
                        <figcaption>
{{--                            <h6 class="tt-title"><a href="#">TITLE</a></h6>--}}
                            {{--                            <p>--}}
                            {{--                                Lorem ipsum dolor sit amet cons.--}}
                            {{--                            </p>--}}
                            <a href="{{ $image->imageLargeLink }}" class="tt-btn-zomm"></a>
                        </figcaption>
                    </figure>
                </div>
            @endforeach
        </div>
        {{--    <div class="text-center isotop_showmore_js">--}}
        {{--        <a href="#" class="btn btn-border">LOAD MORE</a>--}}
        {{--    </div>--}}
    </div>
@endif