/******/ (() => { // webpackBootstrap
/******/ 	"use strict";
var __webpack_exports__ = {};
/*!********************************************************!*\
  !*** ./resources/assets/js/transaction/transaction.js ***!
  \********************************************************/


$(document).ready(function () {
  $('#paymentModeFilter').select2({
    placeholder: 'Select Payment Method',
    allowClear: false
  });
  var tableName = '#tblTransaction';
  $(document).on('click', '#resetFilter', function () {
    $('#paymentModeFilter').select2({
      placeholder: 'Select Payment Method',
      allowClear: false
    });
    $('#paymentModeFilter').val(0).trigger('change');
    $('#tblTransaction').DataTable().ajax.reload(null, false);
  });
});
/******/ })()
;