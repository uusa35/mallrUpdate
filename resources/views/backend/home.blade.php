@extends('backend.layouts.app')

@section('content')
    <div class="row">
        <div class="col-lg-12">
            <div class="portlet box yellow-crusta">
                <div class="portlet-title">
                    <div class="caption">
                        <i class="fa fa-gift"></i>{{ trans('general.important_information') }}
                    </div>
                    <ul class="nav nav-tabs">
                        <li class="active">
                            <a href="#portlet_tab_3" data-toggle="tab">{{ trans('general.videos_for_new_items') }} </a>
                        </li>
                        @can('isAdminOrAbove')
                            <li>
                                <a href="#portlet_tab_2"
                                   data-toggle="tab"> {{ trans('general.videos_for_new_items_for_super') }}</a>
                            </li>
                        @endcan
                        <li class="">
                            <a href="#portlet_tab_1" data-toggle="tab"> Tab 1 </a>
                        </li>
                    </ul>
                </div>
                <div class="portlet-body">
                    <div class="tab-content">
                        <div class="tab-pane" id="portlet_tab_1">
                            <div class="portlet-body">
                                <div class="scroller" style="height: 100%" data-rail-visible="1"
                                     data-rail-color="yellow" data-handle-color="#a1b2bd">
                                    tap 1

                                </div>
                            </div>
                        </div>
                        @can('isAdminOrAbove')
                            <div class="tab-pane" id="portlet_tab_2">
                                <div class="scroller" style="height:100%" data-rail-visible="1"
                                     data-rail-color="yellow"
                                     data-handle-color="#a1b2bd">
                                    @include('backend.partials._videos_for_super')
                                </div>
                            </div>
                        @endif
                        <div class="tab-pane active" id="portlet_tab_3">
                            <div class="scroller" data-rail-visible="1"
                                 data-rail-color="yellow" data-handle-color="#a1b2bd">
                                @include('backend.partials._videos_for_company')
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection