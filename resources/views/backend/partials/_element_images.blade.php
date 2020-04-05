@if($images->isNotEmpty())
    <div class="portlet box blue ">
        <div class="portlet-title">
            <div class="caption">
                <i class="fa fa-gift"></i> {{ trans('general.images') }}
            </div>
        </div>
        <div class="portlet-body form">
            <div class="form-body">
                <div class="row">
                    @foreach($images as $image)
                        <div class="col-lg-3"><img src="{{ $image->imageThumbLink }}" alt=""
                                                   class="img-responsive img-sm">
                            <form action="{{ route('backend.image.destroy', $image->id) }}" method="post">
                                @method('delete')
                                @csrf
                                <button type="submit" class="btn btn-danger">{{ trans('general.delete') }}</button>
                            </form>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
@endif