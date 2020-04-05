<div class="container-indent">
    <div class="container-fluid-custom">
        <div class="row tt-layout-promo-box">
            @foreach($elements as $element)
                <div class="col-sm-6 col-md-4">
                    @include('frontend.wokiee.four.partials._commercial_widget', ['element' => $element])
                </div>
            @endforeach
        </div>
    </div>
</div>