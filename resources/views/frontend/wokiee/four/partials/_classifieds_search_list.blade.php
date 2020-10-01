@if(isset($elements) && $elements->isNotEmpty())
    <div class="row">
        @foreach($elements as $product)
            <div class="{{ count($elements) < 2 ? 'col-lg-8' : 'col-lg-4' }} col-md-6 ">
                @include('frontend.wokiee.four.partials._classified_widget',['element' => $product,'view' => true])
            </div>
        @endforeach
    </div>
@endif
