'use strict';

$(document).ready(function () {
    $('#paymentModeFilter').select2({
        placeholder: 'Select Payment Method',
        allowClear: false,
    });
    let tableName = '#tblTransaction';

    $(document).on('click', '#resetFilter', function () {
        $('#paymentModeFilter').select2({
            placeholder: 'Select Payment Method',
            allowClear: false,
        });
        $('#paymentModeFilter').val(0).trigger('change');
        $('#tblTransaction').DataTable().ajax.reload(null, false);
    });
});
