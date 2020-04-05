<div class="row">
    <div class="col-lg-12">
        <div class="m-heading-1 border-green m-bordered">
            @if(isset($title))
                <h3>{{ $title }}</h3>
            @endif
            @if(isset($message))
                <p class="text-justify">
                    {{ $message }}
                </p>
            @endif
        </div>
    </div>
</div>