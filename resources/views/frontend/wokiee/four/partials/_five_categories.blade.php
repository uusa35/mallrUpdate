@if($elements->isNotEmpty())
    <div class="container-indent0">
        <div class="container">
            <div class="row flex-sm-row tt-layout-promo-box">
                @foreach($elements->take(4) as $element)
                    <div class="col-sm-6">
                        <a href="listing-left-column.html"
                           class="tt-promo-box tt-one-child hover-type-2">
                            <img src="{{ asset(env('IMG_LOADER')) }}"
                                 data-src="{{ $element->imageLargeLink }}"
                                 class="img-responsive img-category"
                                 alt="{{ $element->caption }}">
                            <div class="tt-description">
                                <div class="tt-description-wrapper">
                                    <div class="tt-background"></div>
                                    <div class="tt-title-small">{{ $element->name }}</div>
                                    <div class="tt-title-small">{{ $element->caption }}</div>
                                </div>
                            </div>
                        </a>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
@endif