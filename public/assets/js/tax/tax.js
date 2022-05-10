/******/ (() => { // webpackBootstrap
/******/ 	"use strict";
var __webpack_exports__ = {};
/*!****************************************!*\
  !*** ./resources/assets/js/tax/tax.js ***!
  \****************************************/


$(document).ready(function () {
  var tableName = '#taxTbl';
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
      beforeSend: function beforeSend() {
        startLoader();
      },
      success: function success(result) {
        if (result.success) {
          $('#addModal').modal('hide');
          displaySuccessMessage(result.message);
          livewire.emit('refreshDatatable');
          $('#taxTbl').DataTable().ajax.reload(null, false);
        }
      },
      error: function error(result) {
        displayErrorMessage(result.responseJSON.message);
      },
      complete: function complete() {
        stopLoader();
      }
    });
  });
  $(document).on('hidden.bs.modal', '#addModal', function () {
    resetModalForm('#addNewForm', '#validationErrorsBox');
  });
  $(document).on('click', '.edit-btn', function (event) {
    var taxId = $(event.currentTarget).attr('data-id');
    renderData(taxId);
  });

  window.renderData = function (id) {
    $.ajax({
      url: route('taxes.edit', id),
      type: 'GET',
      beforeSend: function beforeSend() {
        startLoader();
      },
      success: function success(result) {
        if (result.success) {
          $('#editTaxName').val(result.data.name);
          $('#editTaxValue').val(result.data.value);

          if (result.data.is_default === 1) {
            $('input:radio[value=\'1\'][name=\'is_default\']').prop('checked', true);
          } else {
            $('input:radio[value=\'0\'][name=\'is_default\']').prop('checked', true);
          }

          $('#taxId').val(result.data.id);
          $('#editModal').appendTo('body').modal('show');
        }
      },
      error: function error(result) {
        displayErrorMessage(result.responseJSON.message);
      },
      complete: function complete() {
        stopLoader();
      }
    });
  };

  $(document).on('submit', '#editForm', function (event) {
    event.preventDefault();
    var id = $('#taxId').val();
    $.ajax({
      url: route('taxes.update', {
        tax: id
      }),
      type: 'put',
      data: $(this).serialize(),
      beforeSend: function beforeSend() {
        startLoader();
      },
      success: function success(result) {
        if (result.success) {
          displaySuccessMessage(result.message);
          livewire.emit('refreshDatatable');
          $('#editModal').modal('hide');
          $('#taxTbl').DataTable().ajax.reload(null, false);
        }
      },
      error: function error(result) {
        displayErrorMessage(result.responseJSON.message);
      },
      complete: function complete() {
        stopLoader();
      }
    });
  });
  $(document).on('click', '.delete-btn', function (event) {
    var taxId = $(event.currentTarget).data('id');
    var status = $(event.currentTarget).data('status');
    deleteItem(route('taxes.destroy', taxId), '#taxTbl', 'Tax');
  });
  $(document).on('change', '.status', function (event) {
    var taxId = $(event.currentTarget).data('id');
    updateStatus(taxId);
  });

  window.updateStatus = function (id) {
    $.ajax({
      url: route('taxes.default-status', id),
      method: 'post',
      cache: false,
      success: function success(result) {
        if (result.success) {
          displaySuccessMessage(result.message);
          livewire.emit('refreshDatatable');
        }
      }
    });
  };
});
/******/ })()
;