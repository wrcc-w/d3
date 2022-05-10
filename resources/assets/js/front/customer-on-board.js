'use strict';

$(document).ready(function () {
    $('#timeZoneId').select2({
        width: '280px',
    });

// Stepper element
    let element = document.querySelector('#frontStepperId');

// Initialize Stepper
    let stepper = new KTStepper(element);

    stepper.goTo(loginUserStep);

// Handle next step
    stepper.on('kt.stepper.next', function (stepper) {
        console.log(stepper.currentStepIndex);
        let form = '';
        if (stepper.currentStepIndex == 1) {
            form = $('#frontCustomerOnBoardForm1').serialize();
        } else if (stepper.currentStepIndex == 2) {
            form = $('#frontCustomerOnBoardForm2').serialize();

        }

        $.ajax({
            url: route('customer.onboard.store'),
            type: 'POST',
            data: form,
            success: function (result) {
                if (result.success) {
                    if (result.message != '') {
                        displaySuccessMessage(result.message);
                    }
                    stepper.goNext(); // go next step
                }
            },
            error: function (result) {
                displayErrorMessage(result.responseJSON.message);
            },
        });
    });

// Handle previous step
    stepper.on('kt.stepper.previous', function (stepper) {
        stepper.goPrevious(); // go previous step
    });

});

$(document).on('click', '#submitStepper', function () {
    $.ajax({
        url: route('customer.onboard.store'),
        type: 'POST',
        data: $('#frontCustomerOnBoardForm3').serialize(),
        success: function (result) {
            if (result.success) {
                if (result.message != '') {
                    displaySuccessMessage(result.message);
                }
                window.location.href = route('admin.dashboard');
            }
        },
        error: function (result) {
            displayErrorMessage(result.responseJSON.message);
        },
    });
});
