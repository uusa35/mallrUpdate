@if($elements->isNotEmpty())
    <div class="tt-offset-small container-indent element-padding-bottom">
        <div class="container-fluid-custom">
            <div class="row">
                @foreach($elements as $element)
                    <div class="col-sm-6">
                        @include('frontend.wokiee.four.partials._commercial_widget',['element' => $element])
                    </div>
                @endforeach
            </div>
        </div>
    </div>
@endif