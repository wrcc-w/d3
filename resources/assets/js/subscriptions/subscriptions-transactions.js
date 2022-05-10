'use strict';

$(document).on('click', '#resetFilter', function () {
    $('#paymentTypeArr').val('').trigger('change');
});
