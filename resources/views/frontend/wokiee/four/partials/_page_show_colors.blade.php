<div class="tt-wrapper {{ $hidden ? 'd-none' : null }}" id="color-{{ $id }}">
    <div class="tt-title-options">{{ trans('general.colors') }}:</div>
    <ul class="tt-options-swatch options-large">
        @foreach($colors as $col)
            <li class="color-id-element"  data-tooltip="{{ trans('general.choose_your_color') }}">
                <a class="options-color d-none" id="color-id-{{ $id }}-{{ $col->id }}"
                   data-color-id="{{ $col->id }}"
                   data-element-id="{{ $id }}"
                   data-qty=""
                   data-product-attribute-id=""
                   style="background-color: {{ $col->code }};" href="#"></a></li>
        @endforeach
    </ul>
</div>
