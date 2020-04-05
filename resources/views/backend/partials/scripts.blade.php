<script src="{{ asset('js/backend.js') }}"></script>
<script src="{{ asset('js/tinymce.min.js') }}"></script>
<script src="{{ asset('js/backend-custom.js') }}"></script>
<script type="application/javascript">
    window.Laravel = <?php echo json_encode([
        'csrfToken' => csrf_token(),
    ]); ?>
</script>
