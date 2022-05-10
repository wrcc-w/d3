'use strict';

let tableName = '#clientTable';

$(document).on('click', '.delete-btn', function (event) {
    let recordId = $(event.currentTarget).data('id');
    deleteItem(route('clients.destroy', recordId), tableName, 'Client');
});
