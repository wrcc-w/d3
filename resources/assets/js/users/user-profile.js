'use strict'

$(document).on('click','#changePassword', function() {
    $('.pass-check-meter div.flex-grow-1').removeClass('active');
    $('#changePasswordModal').modal('show').appendTo('body');
});

$(document).on('click','#passwordChangeBtn', function() {
    $.ajax({
        url: changePasswordUrl,
        type: 'PUT',
        data: $('#changePasswordForm').serialize(),
        success: function (result) {
            $('#changePasswordModal').modal('hide');
            displaySuccessMessage(result.message);
        },
        error: function error(result) {
            displayErrorMessage(result.responseJSON.message);
        },
    });
});

window.printErrorMessage = function (selector, errorResult) {
    $(selector).show().html('');
    $(selector).text(errorResult.responseJSON.message);
};

$(document).on('hidden.bs.modal','#changePasswordModal', function () {
    resetModalForm('#changePasswordForm', '#validationErrorsBox');
});
