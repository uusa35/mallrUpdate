@can('isAdminOrAbove')
    <div class="col-lg-12">
        @can('user.create')
            <div class="col-lg-4">
                <div class="panel panel-default">
                    <div class="panel-heading">{{ trans('general.new_company_or_user') }}</div>
                    <div class="panel-body text-center">
                        <iframe width="450" height="300"
                                src="https://www.youtube.com/embed/bOF2dKjVCqs" frameborder="0"
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
                                src="https://www.youtube.com/embed/bOF2dKjVCqs" frameborder="0"
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
                                src="https://www.youtube.com/embed/bOF2dKjVCqs"
                                frameborder="0"
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
        @can('color.create')
            <div class="col-lg-4">
                <div class="panel panel-default">
                    <div class="panel-heading">{{ trans('general.new_color') }}</div>
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
        @can('size.create')
            <div class="col-lg-4">
                <div class="panel panel-default">
                    <div class="panel-heading">{{ trans('general.new_size') }}</div>
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
@endcan
