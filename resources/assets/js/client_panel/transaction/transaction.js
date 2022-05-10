'use strict';

$(document).ready(function () {
    $(document).on('click', '#resetFilter', function () {
        $('#paymentModeFilter').select2({
            placeholder: 'Select Payment Method',
            allowClear: false,
        });
        $('#paymentModeFilter').val(0).trigger('change');
    });
});
