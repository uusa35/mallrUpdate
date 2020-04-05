{{-- HomePage Modal--}}
@guest
    @if(is_null(getClientCountry()))
        <div class="modal  fade" id="Modalnewsletter" tabindex="-1" role="dialog" aria-label="myModalLabel"
             aria-hidden="true"
             data-pause=2000>
            <div class="modal-dialog modal-lg">
                <div class="modal-content ">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true"><span
                                    class="icon icon-clear"></span></button>
                    </div>
                    <div class="modal-body">
                        <div class="card">
                            <div class="card-header">
                                {{ trans('general.choose_your_country') }}
                            </div>
                            <div class="card-body">
                                <h5 class="card-title">{{ trans('message.description_country_modal') }}</h5>
                                <p class="card-text">

                                <div class="tt-add-info">
                                    <div class="tt-table-responsive">
                                        <table class="tt-table-shop-01">
                                            @foreach($countries as $country)
                                                <tr>
                                                    <td>
                                                        <a class=href="{{ route('frontend.country.set',['country_id' => $country->id]) }}">
                                                            <img class="img-responsive img-sm"
                                                                 src="{{ $country->imageThumbLink }}"
                                                                 alt="{{ $country->slug }}">
                                                        </a>
                                                    </td>
                                                    <td>
                                                        <a class="btn bnt-lg"
                                                           href="{{ route('frontend.country.set',['country_id' => $country->id]) }}">
                                                            {{ $country->slug }}
                                                        </a>
                                                    </td>
                                                </tr>
                                            @endforeach
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    @endif
@endguest
