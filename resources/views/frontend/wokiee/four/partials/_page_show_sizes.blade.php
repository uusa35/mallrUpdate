<div class="tt-wrapper">
    <div class="tt-title-options">{{ trans('general.sizes') }} :</div>
    <form class="form-default">
        <div class="form-group" data-tooltip="{{ trans('general.choose_color_then_size') }}">
            <select class="form-control" id="size-{{ $id }}" data-element-id="{{ $id }}" required>
                <option value="">{{ trans('general.choose_size') }}</option>
                @foreach($sizes as $size)
                    <option value="{{ $size->id }}">{{ $size->name }}</option>
                @endforeach
            </select>
        </div>
    </form>
</div>
{{--<div class="tt-wrapper">--}}
{{--<div class="tt-title-options">SIZE:</div>--}}
{{--<ul class="tt-options-swatch options-large">--}}
{{--<li><a href="#">4</a></li>--}}
{{--<li class="active"><a href="#">6</a></li>--}}
{{--<li><a href="#">8</a></li>--}}
{{--<li><a href="#">10</a></li>--}}
{{--<li><a href="#">12</a></li>--}}
{{--<li><a href="#">14</a></li>--}}
{{--<li><a href="#">16</a></li>--}}
{{--</ul>--}}
{{--</div>--}}