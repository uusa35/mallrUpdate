@if(isset($services) && $services->isNotEmpty())
    @foreach($services as $service)
        <div class="col-4 col-xs-12 tt-col-item">
            @include('frontend.wokiee.four.partials._service_widget',['element' => $service])
        </div>
    @endforeach
@endif