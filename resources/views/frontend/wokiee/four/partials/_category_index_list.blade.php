@if(isset($elements) && $elements->isNotEmpty())
    <div class="row">
        @foreach($elements as $element)
                <div class="col-6 col-lg-2">
                    @include('frontend.wokiee.four.partials._category_widget')
                </div>
        @endforeach
    </div>
@endif