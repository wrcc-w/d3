/******/ (() => { // webpackBootstrap
/******/ 	"use strict";
var __webpack_exports__ = {};
/*!*********************************************************************!*\
  !*** ./resources/assets/js/client_panel/transaction/transaction.js ***!
  \*********************************************************************/


$(document).ready(function () {
  $(document).on('click', '#resetFilter', function () {
    $('#paymentModeFilter').select2({
      placeholder: 'Select Payment Method',
      allowClear: false
    });
    $('#paymentModeFilter').val(0).trigger('change');
  });
});
/******/ })()
;