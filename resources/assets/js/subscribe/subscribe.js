'use strict'

let tableName = '#subscribersTable'

$(document).on('click', '.delete-btn', function () {
    let subscriberId = $(this).attr('data-id')
    deleteItem(route('super.admin.subscribe.destroy', subscriberId), tableName,
        'Subscriber')
})
