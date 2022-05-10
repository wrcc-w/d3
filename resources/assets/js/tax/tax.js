'use strict';

$(document).ready(function () {
    let tableName = '#taxTbl';

    $(document).on('click', '.addTax', function () {
        $('#addModal').appendTo('body').modal('show');
    });

    $(document).on('submit', '#addNewForm', function (e) {
        e.preventDefault();
        if (isDoubleClicked($(this))) return;

        $.ajax({
            url: route('taxes.store'),
            type: 'POST',
            data: $(this).serialize(),
            beforeSend: function () {
                startLoader();
            },
            success: function (result) {
                if (result.success) {
                    $('#addModal').modal('hide');
                    displaySuccessMessage(result.message);
                    livewire.emit('refreshDatatable');
                    $('#taxTbl').DataTable().ajax.reload(null, false);
                }
            },
            error: function (result) {
                displayErrorMessage(result.responseJSON.message);
            },
            complete: function () {
                stopLoader();
            },
        });
    });

    $(document).on('hidden.bs.modal','#addModal', function () {
        resetModalForm('#addNewForm', '#validationErrorsBox');
    });

    $(document).on('click', '.edit-btn', function (event) {
        let taxId = $(event.currentTarget).attr('data-id');
        renderData(taxId);
    });

    window.renderData = function (id) {
        $.ajax({
            url: route('taxes.edit', id),
            type: 'GET',
            beforeSend: function () {
                startLoader();
            },
            success: function (result) {
                if (result.success) {
                    $('#editTaxName').val(result.data.name);
                    $('#editTaxValue').val(result.data.value);
                    if (result.data.is_default === 1) {
                        $('input:radio[value=\'1\'][name=\'is_default\']').
                            prop('checked', true);
                    } else {
                        $('input:radio[value=\'0\'][name=\'is_default\']').
                            prop('checked', true);
                    }
                    $('#taxId').val(result.data.id);
                    $('#editModal').appendTo('body').modal('show');
                }
            },
            error: function (result) {
                displayErrorMessage(result.responseJSON.message);
            },
            complete: function () {
                stopLoader();
            },
        });
    };

    $(document).on('submit', '#editForm', function (event) {
        event.preventDefault();
        const id = $('#taxId').val();
        $.ajax({
            url: route('taxes.update', { tax: id }),
            type: 'put',
            data: $(this).serialize(),
            beforeSend: function () {
                startLoader();
            },
            success: function (result) {
                if (result.success) {
                    displaySuccessMessage(result.message);
                    livewire.emit('refreshDatatable');
                    $('#editModal').modal('hide');
                    $('#taxTbl').DataTable().ajax.reload(null, false);
                }
            },
            error: function (result) {
                displayErrorMessage(result.responseJSON.message);
            },
            complete: function () {
                stopLoader();
            },
        });
    });

    $(document).on('click', '.delete-btn', function (event) {
        let taxId = $(event.currentTarget).data('id');
        let status = $(event.currentTarget).data('status');
        deleteItem(route('taxes.destroy', taxId), '#taxTbl', 'Tax');
    });

    $(document).on('change', '.status', function (event) {
        let taxId = $(event.currentTarget).data('id');
        updateStatus(taxId);
    });
    window.updateStatus = function (id) {
        $.ajax({
            url: route('taxes.default-status', id),
            method: 'post',
            cache: false,
            success: function (result) {
                if (result.success) {
                    displaySuccessMessage(result.message);
                    livewire.emit('refreshDatatable');
                }
            },
        });
    };

});
