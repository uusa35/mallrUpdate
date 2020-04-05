<li data-thumb="{{ $s->imgThumbLink }}" data-transition="fade" data-slotamount="1"
    data-masterspeed="1000" data-saveperformance="off" data-title="Slide">
    <img src="{{ $s->imgThumbLink }}" alt="slide1" data-bgposition="center center"
         data-bgfit="cover" data-bgrepeat="no-repeat">
    <!-- LAYER NR. 1 -->
    <div class="tp-caption tp-fade fadeout fullscreenvideo"
         data-x="0"
         data-y="0"
         data-speed="600"
         data-start="0"
         data-easing="Power4.easeOut"
         data-endspeed="1500"
         data-endeasing="Power4.easeIn"
         data-autoplay="true"
         data-autoplayonlyfirsttime="false"
         data-nextslideatend="true"
         data-forceCover="1"
         data-dottedoverlay="twoxtwo"
         data-aspectratio="16:9">
        <video class="video-js vjs-default-skin" preload="none"
               poster='{{ $s->imgThumbLink }}' data-setup="{}">
            <source src='{{ $s->url }}' type='video/mp4'>
        </video>
    </div>
    <div class="tp-caption  tp-fade"
         data-x="right"
         data-y="bottom"
         data-voffset="-60"
         data-hoffset="-90"
         data-speed="600"
         data-start="900"
         data-easing="Power4.easeOut"
         data-endeasing="Power4.easeIn">
        <div class="video-play">
            <a class="icon-f-29 btn-play" href="#"></a>
            <a class="icon-f-28 btn-pause" href="#"></a>
        </div>
    </div>
    <!-- TEXT -->
    <div class="tp-caption lfb lft text-center"
         data-x="center"
         data-y="center"
         data-voffset="-20"
         data-hoffset="0"
         data-speed="600"
         data-start="900"
         data-easing="Power4.easeOut"
         data-endeasing="Power4.easeIn">
        <div class="tp-caption1-wd-3 tt-white-color">Oberlo allows you to easily
            import dropshipped products directly into your ecommerce store
        </div>
        @if($s->path)
            <div class="tp-caption1-wd-4"><a
                        href="{{ $s->pathLink }}"
                        class="btn btn-xl"
                        data-text="{{ $s->title }}">{{ $s->title }}</a>
            </div>
        @endif
    </div>
</li>