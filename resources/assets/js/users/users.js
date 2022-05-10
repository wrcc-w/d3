'use strict';

let tableName = '#usersTable';

$(document).on('change', '.status', function (event) {
    let userId = $(event.currentTarget).data('id')
    updateStatus(userId)
})

window.updateStatus = function (id) {
    $.ajax({
        url: recordsURL + '/' + id + '/active-deactive',
        method: 'post',
        cache: false,
        success: function (result) {
            if (result.success) {
                displaySuccessMessage(result.message)
                $('#usersTable').DataTable().ajax.reload(null, false)
            }
        },
    })
}

$(document).on('change', '.is-verified', function (event) {
    let userId = $(event.currentTarget).data('id')
    $.ajax({
        url: recordsURL + '/' + userId + '/is-verified',
        method: 'post',
        cache: false,
        success: function (result) {
            if (result.success) {
                displaySuccessMessage(result.message)
                $('#usersTable').DataTable().ajax.reload(null, false)
            }
        },
    })
})

$(document).on('click', '.delete-btn', function (event) {
    let recordId = $(event.currentTarget).data('id')
    deleteItem(route('users.destroy', recordId), tableName, 'User')
})
