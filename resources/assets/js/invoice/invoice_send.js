'use strict';

$(document).ready(function () {
    $(document).on('click', '.send-btn', function (event) {
        let invoiceId = $(event.currentTarget).data('id');
        let status = 1;

        const swalWithBootstrapButtons = Swal.mixin({
            customClass: {
                confirmButton: 'swal2-confirm btn fw-bold btn-danger mt-0',
                cancelButton: 'swal2-cancel btn fw-bold btn-bg-light btn-color-primary mt-0',
            },
            buttonsStyling: false,
        });

        swalWithBootstrapButtons.fire({
            title: 'Send Invoice !',
            text: 'Are you sure want to send this invoice to client ?',
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#009ef7',
            cancelButtonText: 'No, Cancel',
            confirmButtonText: 'Yes, Send',
        }).then((result) => {
            if (result.isConfirmed) {
                changeInvoiceStatus(invoiceId, status);
            }
        });
    });

    function changeInvoiceStatus (invoiceId, status) {
        $.ajax({
            url: route('send-invoice', { invoice: invoiceId, status: status }),
            type: 'post',
            dataType: 'json',
            success: function (obj) {
                if (obj.success) {
                    window.location.reload();
                }
                Swal.fire({
                    icon: 'success',
                    title: 'Send!',
                    confirmButtonColor: '#009ef7',
                    text: header + ' has been sent.',
                    timer: 2000,
                });
            },
            error: function (data) {
                Swal.fire({
                    title: '',
                    text: data.responseJSON.message,
                    confirmButtonColor: '#009ef7',
                    icon: 'error',
                    timer: 5000,
                });
            },
        });
    }
});

