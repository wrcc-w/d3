/******/ (() => { // webpackBootstrap
/******/ 	"use strict";
var __webpack_exports__ = {};
/*!************************************************!*\
  !*** ./resources/assets/js/payment/payment.js ***!
  \************************************************/


$(document).ready(function () {
  $('#invoice_id').select2({
    dropdownParent: $('#paymentModal')
  });
  var tableName = '#tblPayments';
  $(document).on('click', '.delete-btn', function (event) {
    var id = $(event.currentTarget).data('id');
    deleteItem(route('payments.destroy', id), tableName, 'Payments');
  });
  $(document).on('click', '.addPayment', function () {
    $('#payment_date').flatpickr({
      defaultDate: new Date(),
      dateFormat: currentDateFormat,
      maxDate: new Date()
    });
    $('#paymentModal').appendTo('body').modal('show');
  });
  $(document).on('shown.bs.modal', '.modal', function () {
    $('#invoice_id').select2('open');
  });
  $(document).on('hidden.bs.modal', '#paymentModal', function () {
    $('#invoice_id').val(null).trigger('change');
    resetModalForm('#paymentForm');
  });
  $(document).on('submit', '#paymentForm', function (e) {
    e.preventDefault();
    var btnSubmitEle = $(this).find('#btnPay');
    setAdminBtnLoader(btnSubmitEle);
    $.ajax({
      url: route('payments.store'),
      type: 'POST',
      data: $(this).serialize(),
      success: function success(result) {
        if (result.success) {
          $('#paymentModal').modal('hide');
          displaySuccessMessage(result.message);
          livewire.emit('refreshDatatable');
          $(tableName).DataTable().ajax.reload(null, false);
        }
      },
      error: function error(result) {
        displayErrorMessage(result.responseJSON.message);
      },
      complete: function complete() {
        setAdminBtnLoader(btnSubmitEle);
      }
    });
  });
  $(document).on('change', '.invoice', function () {
    var invoiceId = $(this).val();

    if (isEmpty(invoiceId)) {
      $('#due_amount').val(0);
      $('#paid_amount').val(0);
      return false;
    }

    $.ajax({
      url: route('payments.get-invoiceAmount', invoiceId),
      type: 'get',
      dataType: 'json',
      success: function success(result) {
        if (result.success) {
          $('#due_amount').val(number_format(result.data.totalDueAmount));
          $('#paid_amount').val(number_format(result.data.totalPaidAmount));
        }
      },
      error: function error(result) {
        displayErrorMessage(result.responseJSON.message);
      }
    });
  });
});
$(document).on('click', '.edit-btn', function (event) {
  var paymentId = $(event.currentTarget).attr('data-id');
  renderData(paymentId);
});

window.renderData = function (id) {
  $.ajax({
    url: route('payments.edit', id),
    type: 'GET',
    beforeSend: function beforeSend() {
      startLoader();
    },
    success: function success(result) {
      if (result.success) {
        $('#edit_invoice_id').val(result.data.invoice.invoice_id);
        $('#edit_amount').val(result.data.amount);
        $('#edit_payment_date').flatpickr({
          defaultDate: result.data.payment_date,
          dateFormat: currentDateFormat,
          maxDate: new Date()
        });
        $('#edit_payment_note').val(result.data.notes);
        $('#paymentId').val(result.data.id);
        $('#transactionId').val(result.data.payment_id);
        $('#invoice').val(result.data.invoice_id);
        $('#totalDue_amount').val(number_format(result.data.DueAmount.original.data.totalDueAmount));
        $('#totalPaid_amount').val(number_format(result.data.DueAmount.original.data.totalPaidAmount));
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

$(document).on('submit', '#editPaymentForm', function (event) {
  event.preventDefault();
  var id = $('#paymentId').val();
  $.ajax({
    url: route('payments.update', {
      payment: id
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
        $('#tblPayments').DataTable().ajax.reload(null, false);
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
/******/ })()
;