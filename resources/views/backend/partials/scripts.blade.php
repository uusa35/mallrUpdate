<script src="{{ mix('js/backend.js') }}"></script>
<script src="{{ mix('js/tinymce.min.js') }}"></script>
<script src="{{ mix('js/backend-custom.js') }}"></script>
{{--<script src="{{ mix('js/datepicker.js') }}"></script>--}}
<script type="application/javascript">
    window.Laravel = <?php echo json_encode([
        'csrfToken' => csrf_token(),
    ]); ?>
</script>
<script>
    toastr.options = {
        "closeButton": true,
        "debug": false,
        "positionClass": "{{ app()->getLocale() === 'ar' ? "toast-top-left" : "toast-top-left" }}",
        "onclick": null,
        "showDuration": "1000",
        "hideDuration": "2000",
        "timeOut": "5000",
        "extendedTimeOut": "1000",
        "showEasing": "swing",
        "hideEasing": "linear",
        "showMethod": "fadeIn",
        "hideMethod": "fadeOut"
    }
    @if(session()->has('success'))
    toastr.success("{{ session()->get('success') }}");
    console.log('success')
    @elseif(session()->has('error'))
    toastr.error("{{ session()->get('error') }}");
    @elseif(session()->has('warning'))
    toastr.warning("{{ session()->get('warning') }}");
    @endif
</script>
