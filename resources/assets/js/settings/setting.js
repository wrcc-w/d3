'use strict';

$(document).ready(function () {
    $('#currencyType').select2({
        width: '100%',
    });

    $('#timeZone').select2({
        width: '100%',
    });

    $('#dateFormat').select2({
        width: '100%',
    });

    $(document).on('change','input[type=radio][name=decimal_separator]', function () {
        if (this.value === ',') {
            $('input[type=radio][name=thousand_separator][value="."]').
                prop('checked', true);
        } else {
            $('input[type=radio][name=thousand_separator][value=","]').
                prop('checked', true);
        }
    });
    $(document).on('change','input[type=radio][name=thousand_separator]', function () {
        if (this.value === ',') {
            $('input[type=radio][name=decimal_separator][value="."]').
                prop('checked', true);
        } else {
            $('input[type=radio][name=decimal_separator][value=","]').
                prop('checked', true);
        }
    });

    $(document).on('change', '#appLogo', function () {
        $('#validationErrorsBox').addClass('d-none');
        if (isValidLogo($(this), '#validationErrorsBox')) {
            displaySettingImage(this, '#previewImage');
        }
    });
    $(document).on('change', '#companyLogo', function () {
        $('#validationErrorsBox').addClass('d-none');
        if (isValidLogo($(this), '#validationErrorsBox')) {
            displaySettingImage(this, '#previewImage1');
        }
    });
});

window.isValidLogo = function (inputSelector, validationMessageSelector) {
    let ext = $(inputSelector).val().split('.').pop().toLowerCase();
    if ($.inArray(ext, ['jpg', 'png', 'jpeg']) == -1) {
        $(inputSelector).val('');
        $(validationMessageSelector).removeClass('d-none');
        $(validationMessageSelector).
            html('The image must be a file of type: jpg, jpeg, png.').
            show();
        return false;
    }
    $(validationMessageSelector).hide();
    return true;
};

window.displaySettingImage = function (input, selector) {
    let displayPreview = true;
    if (input.files && input.files[0]) {
        let reader = new FileReader();
        reader.onload = function (e) {
            let image = new Image();
            image.src = e.target.result;
            image.onload = function () {
                $(selector).attr('src', e.target.result);
                displayPreview = true;
            };
        };
        if (displayPreview) {
            reader.readAsDataURL(input.files[0]);
            $(selector).show();
        }
    }
}

$(document).on('submit', '#createSetting', function () {
    let companyAddress = $('#companyAddress').val();
    if (!$.trim(companyAddress)) {
        displayErrorMessage('Please enter company address');
        return false;
    }
});
