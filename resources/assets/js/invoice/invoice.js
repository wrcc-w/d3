'use strict';

$(document).ready(function () {
    $('#status_filter').select2({
        placeholder:'All',
    });
    if(status==''){
        $('#status_filter').val(5).trigger('change');
    }
    let tableName = '#tblInvoices';

    $(document).on('click', '.delete-btn', function (event) {
        let id = $(event.currentTarget).data('id');
        deleteItem(route('invoices.destroy', id), tableName, 'Invoice');
    });

    $(document).on('click', '#resetFilter', function () {
        $('#status_filter').val(5).trigger('change');
        $('#status_filter').select2({
            placeholder: 'All',
        });
    });
    let uri = window.location.toString();
    if (uri.indexOf("?") > 0) {
        let clean_uri = uri.substring(0, uri.indexOf("?"));
        window.history.replaceState({}, document.title, clean_uri);
    }

    $(document).on('click', '.reminder-btn', function () {
        let invoiceId = $(this).data('id');
        $.ajax({
            type: 'POST',
            url: route('invoice.payment-reminder', invoiceId),
            beforeSend: function () {
                screenLock();
                startLoader();
            },
            success: function (result) {
                if (result.success) {
                    displaySuccessMessage(result.message);
                }
            }, error: function (result) {
                displayErrorMessage(result.message);
            },
            complete: function () {
                stopLoader();
                screenUnLock();
            },
        });
    });
});
