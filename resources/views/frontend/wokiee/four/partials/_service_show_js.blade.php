@if($element)
    <script type="text/javascript">
        console.log('here from inside the scripts.');
        $(document).ready(function () {
            var lang = $('#lang').text();
            console.log('the lang', lang);
            $('[class*="timing-start-end-"]').on('click', function(e) {
                console.log('timing choosen');
                console.log('the e', e.target);
                timing_id = $(e.target).data('id');
                $('#timing_id').attr('value', timing_id);
                day_selected_format = $('#day_selected_format').attr('value');
                console.log('the day_selected format', day_selected_format);
                service_id = $(e.target).data('service-id');
                service_name = $(e.target).data('service-name');
                day_name = $(e.target).data('day-name');
                timing_start = $(e.target).data('timing-start');
                timing_end = $(e.target).data('timing-end');
                console.log('the timing id', timing_id);
                console.log('the day_name', day_name);
                console.log('the service_name', service_name);
                $('.service_alert').removeClass('d-none');
                $('.cart-btn').removeClass('disabled');
                if (lang === 'ar') {
                    $('#service-chosen-title').text('تم اختيار خدمة '
                        + service_name + ' يوم ' + day_name + ' الموافق ' + day_selected_format + 'من الساعة ' + timing_start + ' وحتى' + timing_end
                        + ' للتأكيد .. يرجى إضافة الخدمة إلى عربة التسوق'
                    );
                } else {
                    $('#service-chosen-title').text(`${service_name} is selected. Day : ${day_name} - ${day_selected_format}, starting from : ${timing_start} to ${timing_end}
                <br> Please kindly add service to Cart.
                `);
                }

            });
        });
    </script>
@endif`