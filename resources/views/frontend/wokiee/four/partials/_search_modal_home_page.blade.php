{{-- HomePage Modal--}}
<div class="modal  fade" id="Modalnewsletter" tabindex="-1" role="dialog" aria-label="myModalLabel" aria-hidden="true"
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
                        {{ trans('general.search_your_occasion') }}
                    </div>
                    <div class="card-body">
                        <h5 class="card-title">{{ trans('general.sub_title_your_occasion') }}</h5>
                        <p class="card-text">
                            {{ trans('message.search_your_occasion') }}
                        </p>
                        <br>
                        @include('frontend.wokiee.four.partials._search_form_set_time_and_area')
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>