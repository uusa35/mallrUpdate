<a href="{{ $element->url }}" class="tt-promo-box" id="commercial-{{ $element->id }}">
    <img src="{{ $element->imageMediumLink }}"
         data-src="{{ $element->imageLargeLink }}"
         alt="{{ $element->caption }}">
    @if($element->name)
        <div class="tt-description">
            <div class="tt-description-wrapper">
                <div class="tt-background"></div>
                <div class="tt-title-small">{{ $element->title }}</div>
                <div class="tt-title-large">{{ $element->caption }}</span>
                </div>
            </div>
        </div>
    @endif
</a>