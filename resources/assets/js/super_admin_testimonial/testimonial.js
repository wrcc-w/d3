'use strict'

$(document).on('submit', '#addNewForm', function (event) {
    event.preventDefault()
    let loadingButton = jQuery(this).find('#btnSave')
    loadingButton.button('loading')
    let formData = new FormData($(this)[0])
    $('#btnSave').attr('disabled', true)
    $.ajax({
        url: route('admin-testimonial.store'),
        type: 'POST',
        dataType: 'json',
        data: formData,
        processData: false,
        contentType: false,
        success: function success (result) {
            if (result.success) {
                displaySuccessMessage(result.message)
                $('#addModal').modal('hide')
                livewire.emit('refreshDatatable');
                $('#AdminTestimonialTbl').DataTable().ajax.reload(null, false)
                $('#btnSave').attr('disabled', false)
            }
        },
        error: function error (result) {
            displayErrorMessage(result.responseJSON.message)
            $('#btnSave').attr('disabled', false)
        },
        complete: function complete () {
            loadingButton.button('reset')
        },
    });

});

$(document).on('click', '.show-btn', function () {
    let id = $(this).attr('data-id')
    $.ajax({
        url: route('admin-testimonial.show', id),
        type: 'GET',
        success: function (result) {
            if (result.success) {
                let ext = result.data.image_url.split('.').
                    pop().
                    toLowerCase()
                if (ext == '') {
                    $('#showPreviewImage').
                        css('background-image',
                            'url("' + result.data.image_url + '")')
                } else {
                    $('#showPreviewImage').
                        css('background-image',
                            'url("' + result.data.image_url + '")')
                }
                $('.show-name').text(result.data.name)
                $('.show-position').text(result.data.position)
                $('.show-description').text(result.data.description)
                if (isEmpty(result.data.document_url)) {
                    $('#documentUrl').hide()
                    $('.btn-view').hide()
                } else {
                    $('#documentUrl').show()
                    $('.btn-view').show()
                    $('#documentUrl').attr('href', result.data.document_url)
                }
                $('#showModal').modal('show')
                ajaxCallCompleted()
            }
        },
        error: function (result) {
            displayErrorMessage(result.responseJSON.message)
        },
    })
});
//
$(document).on('click', '.edit-btn', function (event) {
    if (ajaxCallIsRunning) {
        return
    }
    ajaxCallInProgress()
    let testimonialId = $(event.currentTarget).data('id')
    renderData(testimonialId)
})
//
window.renderData = function (id) {
    $.ajax({
        url: route('admin-testimonial.edit', id),
        type: 'GET',
        success: function (result) {
            if (result.success) {
                let ext = result.data.image_url.split('.').
                    pop().
                    toLowerCase()
                if (ext == '') {
                    $('#editPreviewImage').
                        css('background-image',
                            'url("' + result.data.image_url + '")')
                } else {
                    $('#editPreviewImage').
                        css('background-image',
                            'url("' + result.data.image_url + '")')
                }
                $('#testimonialId').val(result.data.id)
                $('#editName').val(result.data.name)
                $('#editPosition').val(result.data.position)
                $('#editDescription').val(result.data.description)
                if (isEmpty(result.data.document_url)) {
                    $('#documentUrl').hide()
                    $('.btn-view').hide()
                } else {
                    $('#documentUrl').show()
                    $('.btn-view').show()
                    $('#documentUrl').attr('href', result.data.document_url)
                }
                $('#editModal').modal('show')
                ajaxCallCompleted()
            }
        },
        error: function (result) {
            displayErrorMessage(result.responseJSON.message)
        },
    })
}

$(document).on('submit', '#editForm', function (event) {
    event.preventDefault()
    let loadingButton = jQuery(this).find('#btnEditSave')
    loadingButton.button('loading')
    $('#btnEditSave').attr('disabled', true)
    let id = $('#testimonialId').val()
    let formData = new FormData($(this)[0])
    $.ajax({
        url: route('admin-testimonial.update', id),
        type: 'post',
        data: formData,
        processData: false,
        contentType: false,
        success: function (result) {
            if (result.success) {
                displaySuccessMessage(result.message)
                $('#editModal').modal('hide')
                livewire.emit('refreshDatatable');
                $('#AdminTestimonialTbl').DataTable().ajax.reload(null, false)
                $('#btnEditSave').attr('disabled', false)
            }
        },
        error: function (result) {
            displayErrorMessage(result.responseJSON.message)
            $('#btnEditSave').attr('disabled', false)
        },
        complete: function () {
            loadingButton.button('reset')
        },
    })
});
$(document).on('click', '.addModal', function () {
    $('#addModal').appendTo('body').modal('show')
})

$('#addModal').on('hidden.bs.modal', function () {
    resetModalForm('#addNewForm', '#addModal #validationErrorsBox')
    $('#previewImage').
        attr('src', defaultDocumentImageUrl).
        css('background-image', `url(${defaultDocumentImageUrl})`)
    $('#btnSave').attr('disabled', false)
})

$('#addModal').on('shown.bs.modal', function () {
    $('#addModal #validationErrorsBox').show()
    $('#addModal #validationErrorsBox').addClass('d-none')
})
//
$('#editModal').on('hidden.bs.modal', function () {
    resetModalForm('#editForm', '#editModal #editValidationErrorsBox')
    $('#previewImage').
        attr('src', defaultDocumentImageUrl).
        css('background-image', `url(${defaultDocumentImageUrl})`)
    $('#btnEditSave').attr('disabled', false)
})
//
$('#editModal').on('shown.bs.modal', function () {
    $('#editModal #editValidationErrorsBox').show()
    $('#editModal #editValidationErrorsBox').addClass('d-none')
})

$(document).on('click', '.delete-btn', function (event) {
    let testimonialId = $(event.currentTarget).data('id')
    deleteItem(route('admin-testimonial.destroy', testimonialId),
        $('#AdminTestimonialTbl'), 'Testimonial')
})
//
$(document).on('change', '#profile', function () {
    let extension = isValidDocument($(this), '#addModal #validationErrorsBox')
    if (!isEmpty(extension) && extension != false) {
        displayDocument(this, '#previewImage', extension)
    }
})

$(document).on('change', '#editProfile', function () {
    let extension = isValidDocument($(this),
        '#editModal #editValidationErrorsBox')
    if (!isEmpty(extension) && extension != false) {
        displayDocument(this, '#editPreviewImage', extension)
    }
})

window.isValidDocument = function (
    inputSelector, validationMessageSelector) {
    let ext = $(inputSelector).val().split('.').pop().toLowerCase()
    if ($.inArray(ext, ['png', 'jpg', 'jpeg']) ==
        -1) {
        $(inputSelector).val('')
        $(validationMessageSelector).
            html(profileError).
            removeClass('d-none')
        return false
    }
    $(validationMessageSelector).
        html(profileError).
        addClass('d-none')
    return ext
}
