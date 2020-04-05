<script src="{{ mix('js/wokiee.demo.js') }}"></script>
<script src="{{ mix('js/app.js') }}"></script>
<script src="{{ mix('js/frontend-custom.js') }}"></script>
@if(app()->isLocale('ar'))
    {{--<script src="{{ mix('js/wokiee.demo-rtl.js') }}"></script>--}}
    <script src="{{ mix('js/frontend-ar.js') }}"></script>
@else
    {{--<script src="{{ mix('js/wokiee.demo.js') }}"></script>--}}
    <script src="{{ mix('js/frontend-en.js') }}"></script>
@endif
@if($settings->code)
    {!!  $settings->code !!}
@endif
@if(app()->environment('production'))
@endif

