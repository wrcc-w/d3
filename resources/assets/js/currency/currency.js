'use strict';

// $(document).ready(function () {
//
//     let tableName = '#currencyTbl';
//     let tbl = $(tableName).DataTable({
//         processing: true,
//         serverSide: true,
//         searchDelay: 500,
//         'language': {
//             'lengthMenu': 'Show _MENU_',
//         },
//         'order': [[0, 'asc']],
//         ajax: {
//             url: route('currencies.index'),
//         },
//         columnDefs: [
//             {
//                 'targets': [3],
//                 'orderable': false,
//                 'className': 'text-center  text-nowrap',
//                 'width': '8%',
//             },
//             {
//                 targets: '_all',
//                 defaultContent: 'N/A',
//                 'className': 'text-start align-middle text-nowrap',
//             },
//         ],
//         columns: [
//             {
//                 data: function (row) {
//                     return row.name;
//                 },
//                 name: 'name',
//             },
//             {
//                 data: function (row) {
//                     return row.icon;
//                 },
//                 name: 'icon',
//             },
//             {
//                 data: function (row) {
//                     return row.code;
//                 },
//                 name: 'code',
//             },
//             {
//                 data: function (row) {
//                     let data = [
//                         {
//                             'id': row.id,
//                         }];
//                     return prepareTemplateRender('#modalTemplate', data);
//                 }, name: 'id',
//             },
//         ],
//     });
//     handleSearchDatatable(tbl);
// });
$(document).on('click', '.addCurrency', function () {
    $('#addModal').appendTo('body').modal('show');
});

$(document).on('submit', '#addNewForm', function (e) {
    e.preventDefault();
    $.ajax({
        url: route('currencies.store'),
        type: 'POST',
        data: $(this).serialize(),
        success: function (result) {
            if (result.success) {
                $('#addModal').modal('hide');
                displaySuccessMessage(result.message);
                livewire.emit('refreshDatatable');
                $('#currencyTbl').DataTable().ajax.reload(null, false);
            }
        },
        error: function (result) {
            displayErrorMessage(result.responseJSON.message);
        },
    });
});

$(document).on('hidden.bs.modal','#addModal', function () {
    resetModalForm('#addNewForm', '#validationErrorsBox');
});

$(document).on('click', '.edit-btn', function (event) {
    let currencyId = $(event.currentTarget).attr('data-id');
    renderData(currencyId);
});

window.renderData = function (id) {
    $.ajax({
        url: route('currencies.edit', id),
        type: 'GET',
        success: function (result) {
            if (result.success) {
                $('#editCurrencyName').val(result.data.name);
                $('#editCurrencyIcon').val(result.data.icon);
                $('#editCurrencyCode').val(result.data.code);
                $('#currencyId').val(result.data.id);
                $('#editModal').appendTo('body').modal('show');
            }
        },
        error: function (result) {
            displayErrorMessage(result.responseJSON.message);
        },
    });
};

$(document).on('submit', '#editForm', function (event) {
    event.preventDefault();
    const id = $('#currencyId').val();
    $.ajax({
        url: route('currencies.update', { currency: id }),
        type: 'put',
        data: $(this).serialize(),
        success: function (result) {
            if (result.success) {
                displaySuccessMessage(result.message);
                livewire.emit('refreshDatatable');
                $('#editModal').modal('hide');
                $('#currencyTbl').DataTable().ajax.reload(null, false);
            }
        },
        error: function (result) {
            displayErrorMessage(result.responseJSON.message);
        },
    });
});

$(document).on('click', '.delete-btn', function (event) {
    let currencyId = $(event.currentTarget).data('id');
    deleteItem(route('currencies.destroy', currencyId), '#currencyTbl',
        'Currency');
});
