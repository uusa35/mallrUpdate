<div class="tt-mobile-product-layout visible-xs">
    <div class="tt-mobile-product-slider arrow-location-center slick-animated-show-js">
        <div><img src="{{ $element->imageLargeLink }}" alt="{{ $element->slug }}"></div>
        @if($element->images->isNotEmpty())
            @foreach($element->images as $img)
                <div><img src="{{ $img->imageLargeLink}}" alt="{{ $element->slug }}"></div>
            @endforeach
        @endif
        @if($element->video_url)
            <div>
                <div class="embed-responsive embed-responsive-16by9">
                    <iframe class="embed-responsive-item" src="{{ $element->video_url }}"
                            allowfullscreen></iframe>
                </div>
            </div>
        @endif
        @if($element->video_url_two)
            <div>
                <div class="embed-responsive embed-responsive-16by9">
                    <iframe class="embed-responsive-item" src="{{ $element->video_url_two }}"
                            allowfullscreen></iframe>
                </div>
            </div>
        @endif
        {{--<div>--}}
        {{--<div class="tt-video-block">--}}
        {{--<a href="#" class="link-video"></a>--}}
        {{--<video class="movie" src="video/video.mp4" poster="video/video_img.jpg"></video>--}}
        {{--</div>--}}
        {{--</div>--}}
    </div>
</div>