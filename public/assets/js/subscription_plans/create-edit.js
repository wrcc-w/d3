/******/ (() => { // webpackBootstrap
/******/ 	"use strict";
var __webpack_exports__ = {};
/*!***************************************************************!*\
  !*** ./resources/assets/js/subscription_plans/create-edit.js ***!
  \***************************************************************/


$(document).ready(function () {
  $('.price-input').trigger('input');
  $(window).on('beforeunload', function () {
    $('input[type=submit]').prop('disabled', 'disabled');
  });
  $('#createSubscriptionPlanForm, #editSubscriptionPlanForm').find('input:text:visible:first').focus();
  $(document).on('submit', '#createSubscriptionPlanForm, #editSubscriptionPlanForm', function () {
    $('#btnSave').attr('disabled', true);
  });
});
/******/ })()
;