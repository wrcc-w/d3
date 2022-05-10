/******/ (() => { // webpackBootstrap
/******/ 	"use strict";
var __webpack_exports__ = {};
/*!******************************************!*\
  !*** ./resources/assets/js/faqs/faqs.js ***!
  \******************************************/


$(document).on('submit', '#addNewForm', function (event) {
  event.preventDefault();
  var loadingButton = jQuery(this).find('#btnSave');
  loadingButton.button('loading');
  $('#btnSave').attr('disabled', true);
  $.ajax({
    url: route('faqs.store'),
    type: 'POST',
    data: $(this).serialize(),
    success: function success(result) {
      if (result.success) {
        displaySuccessMessage(result.message);
        $('#addModal').modal('hide');
        livewire.emit('refreshDatatable');
        $('#faqsTable').DataTable().ajax.reload(null, false);
        $('#btnSave').attr('disabled', false);
      }
    },
    error: function error(result) {
      displayErrorMessage(result.responseJSON.message);
      $('#btnSave').attr('disabled', false);
    },
    complete: function complete() {
      loadingButton.button('reset');
    }
  });
}); //

$(document).on('click', '.edit-btn', function (event) {
  // if (ajaxCallIsRunning) {
  //     return;
  // }
  // ajaxCallInProgress();
  var faqsId = $(event.currentTarget).data('id');
  renderData(faqsId);
});
$(document).on('click', '.show-btn', function (event) {
  // if (ajaxCallIsRunning) {
  //     return;
  // }
  ajaxCallInProgress();
  var faqsId = $(event.currentTarget).data('id');
  $.ajax({
    url: route('faqs.show', faqsId),
    type: 'GET',
    success: function success(result) {
      if (result.success) {
        $('#showQuestion').text(result.data.question);
        $('#showAnswer').text(result.data.answer);
        $('#showModal').modal('show'); // ajaxCallCompleted();
      }
    },
    error: function error(result) {
      displayErrorMessage(result.responseJSON.message);
    }
  });
});

window.renderData = function (id) {
  $.ajax({
    url: route('faqs.edit', id),
    type: 'GET',
    success: function success(result) {
      $('#faqsId').val(result.data.id);
      $('#editQuestion').val(result.data.question);
      $('#editAnswer').val(result.data.answer);
      $('#editModal').modal('show');
      ajaxCallCompleted();
    },
    error: function error(result) {
      displayErrorMessage(result.responseJSON.message);
    }
  });
};

$(document).on('submit', '#editForm', function (event) {
  event.preventDefault();
  var loadingButton = jQuery(this).find('#btnEditSave');
  loadingButton.button('loading');
  $('#btnEditSave').attr('disabled', true);
  var id = $('#faqsId').val();
  $.ajax({
    url: route('faqs-update', id),
    type: 'post',
    data: $(this).serialize(),
    success: function success(result) {
      displaySuccessMessage(result.message);
      $('#editModal').modal('hide');
      livewire.emit('refreshDatatable');
      $('#btnEditSave').attr('disabled', false);
    },
    error: function error(result) {
      displayErrorMessage(result.responseJSON.message);
      $('#btnEditSave').attr('disabled', false);
    },
    complete: function complete() {
      loadingButton.button('reset');
    }
  });
});
$(document).on('click', '.addModal', function () {
  $('#addModal').appendTo('body').modal('show');
});
$('#addModal').on('hidden.bs.modal', function () {
  resetModalForm('#addNewForm', '#addModal #validationErrorsBox');
  $('#btnSave').attr('disabled', false);
});
$('#editModal').on('hidden.bs.modal', function () {
  resetModalForm('#editForm', '#editModal #editValidationErrorsBox');
  $('#btnEditSave').attr('disabled', false);
});
$(document).on('click', '.delete-btn', function (event) {
  var faqsId = $(event.currentTarget).data('id');
  deleteItem(route('faqs.destroy', faqsId), $('#faqsTable'), 'FAQs');
});
/******/ })()
;