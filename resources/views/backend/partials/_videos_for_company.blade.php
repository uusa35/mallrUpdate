<div class="col-lg-12">
    @can('service.create')
        <div class="col-lg-4">
            <div class="panel panel-default">
                <div class="panel-heading">{{ trans('general.new_service') }}</div>
                <div class="panel-body text-center">
                    <iframe width="450" height="300"
                            src="https://www.youtube.com/embed/CQfm9BYUJPI" frameborder="0"
                            allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture"
                            allowfullscreen></iframe>
                </div>
            </div>
        </div>
    @endcan
    @can('product.create')
        <div class="col-lg-4">
            <div class="panel panel-default">
                <div class="panel-heading">{{ trans('general.new_product') }}</div>
                <div class="panel-body text-center">
                    <iframe width="450" height="300"
                            src=https://www.youtube.com/embed/vGH_1txn3oE" frameborder="0"
                            allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture"
                            allowfullscreen></iframe>
                </div>
            </div>
        </div>
    @endcan
    @can('timing.create')
        <div class="col-lg-4">
            <div class="panel panel-default">
                <div class="panel-heading">{{ trans('general.new_timing') }}</div>
                <div class="panel-body text-center">
                    <iframe width="450" height="300"
                            src="https://www.youtube.com/embed/KTkClkW0MZw"
                            frameborder="0"
                            allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture"
                            allowfullscreen></iframe>
                </div>
            </div>
        </div>
    @endcan
    @can('user.create')
        <div class="col-lg-4">
            <div class="panel panel-default">
                <div class="panel-heading">{{ trans('general.new_user') }}</div>
                <div class="panel-body text-center">
                    <iframe width="450" height="300"
                            src="https://www.youtube.com/embed/2C2a93YKIQE" frameborder="0"
                            allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture"
                            allowfullscreen></iframe>
                </div>
            </div>
        </div>
    @endcan
    @can('category.create')
        <div class="col-lg-4">
            <div class="panel panel-default">
                <div class="panel-heading">{{ trans('general.new_category') }}</div>
                <div class="panel-body text-center">
                    <iframe width="450" height="300"
                            src="https://www.youtube.com/embed/fUkN1K5t0ZY" frameborder="0"
                            allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture"
                            allowfullscreen></iframe>
                </div>
            </div>
        </div>
    @endcan
    @can('commercial.create')
        <div class="col-lg-4">
            <div class="panel panel-default">
                <div class="panel-heading">{{ trans('general.new_commercial') }}</div>
                <div class="panel-body text-center">
                    <iframe width="450" height="300"
                            src="https://www.youtube.com/embed/2C2a93YKIQE" frameborder="0"
                            allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture"
                            allowfullscreen></iframe>
                </div>
            </div>
        </div>
    @endcan
    @can('notification.create')
        <div class="col-lg-4">
            <div class="panel panel-default">
                <div class="panel-heading">{{ trans('general.new_notification') }}</div>
                <div class="panel-body text-center">
                    <iframe width="450" height="300"
                            src="https://www.youtube.com/embed/XPjH5bitkO8" frameborder="0"
                            allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture"
                            allowfullscreen></iframe>
                </div>
            </div>
        </div>
    @endcan
        @can('slide.create')
            <div class="col-lg-4">
                <div class="panel panel-default">
                    <div class="panel-heading">{{ trans('general.new_slide') }}</div>
                    <div class="panel-body text-center">
                        <iframe width="450" height="300"
                                src="https://www.youtube.com/embed/bOF2dKjVCqs"
                                frameborder="0"
                                allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture"
                                allowfullscreen></iframe>
                    </div>
                </div>
            </div>
        @endcan
</div>