/******/ (() => { // webpackBootstrap
/******/ 	"use strict";
var __webpack_exports__ = {};
/*!************************************************!*\
  !*** ./resources/assets/js/invoice/invoice.js ***!
  \************************************************/


$(document).ready(function () {
  $('#status_filter').select2({
    placeholder: 'All'
  });

  if (status == '') {
    $('#status_filter').val(5).trigger('change');
  }

  var tableName = '#tblInvoices';
  $(document).on('click', '.delete-btn', function (event) {
    var id = $(event.currentTarget).data('id');
    deleteItem(route('invoices.destroy', id), tableName, 'Invoice');
  });
  $(document).on('click', '#resetFilter', function () {
    $('#status_filter').val(5).trigger('change');
    $('#status_filter').select2({
      placeholder: 'All'
    });
  });
  var uri = window.location.toString();

  if (uri.indexOf("?") > 0) {
    var clean_uri = uri.substring(0, uri.indexOf("?"));
    window.history.replaceState({}, document.title, clean_uri);
  }

  $(document).on('click', '.reminder-btn', function () {
    var invoiceId = $(this).data('id');
    $.ajax({
      type: 'POST',
      url: route('invoice.payment-reminder', invoiceId),
      beforeSend: function beforeSend() {
        screenLock();
        startLoader();
      },
      success: function success(result) {
        if (result.success) {
          displaySuccessMessage(result.message);
        }
      },
      error: function error(result) {
        displayErrorMessage(result.message);
      },
      complete: function complete() {
        stopLoader();
        screenUnLock();
      }
    });
  });
});
/******/ })()
;