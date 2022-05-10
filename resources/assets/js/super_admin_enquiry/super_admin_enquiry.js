'use strict'

$(document).on('click', '#resetFilter', function () {
    $('#filter_status').val(2).trigger('change')
})

$(document).on('click', '.delete-btn', function (e) {
    let id = $(e.currentTarget).data('id')
    deleteItem(enquiryUrl + '/' + id, '#superAdminEnquiriesTable', 'Enquiry')
})
