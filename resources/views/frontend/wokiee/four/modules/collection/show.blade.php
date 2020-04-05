@extends('frontend.wokiee.four.layouts.app')

@section('breadcrumbs')
    {{ Breadcrumbs::render('frontend.collection.show',$element) }}
@endsection

@section('body')
    <div class="container-indent nomargin">
        @include('frontend.wokiee.four.partials._user_show_header',['element' => $element->user])
        <div class="container-indent">
            <div class="container container-fluid-custom-mobile-padding">
                </br>
                @include('frontend.wokiee.four.partials._user_show_information',['element'=> $element->user])
                {{--            <div class="container-fluid-custom container-fluid-custom-mobile-padding">--}}
                </br>
                </br>
                @include('frontend.wokiee.four.partials._collection_widget',['element' => $element])
                <div class="sharethis-inline-share-buttons"></div>
            </div>
        </div>
    </div>
@endsection


@section('scripts')
    @parent
    <script type="text/javascript" src="https://platform-api.sharethis.com/js/sharethis.js#property=5c6ed2597056550011c4ab2a&product=inline-share-buttons"></script>
@endsection
