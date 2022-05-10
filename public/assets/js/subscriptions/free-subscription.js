/******/ (() => { // webpackBootstrap
/******/ 	"use strict";
var __webpack_exports__ = {};
/*!****************************************************************!*\
  !*** ./resources/assets/js/subscriptions/free-subscription.js ***!
  \****************************************************************/


$(document).ready(function () {
  $.ajaxSetup({
    headers: {
      'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
  });
  $(document).on('click', '.freePayment', function () {
    var _this = this;

    if (typeof getLoggedInUserdata != 'undefined' && getLoggedInUserdata == '') {
      window.location.href = logInUrl;
      return true;
    }

    if ($(this).data('plan-price') === 0) {
      $(this).addClass('disabled');
      var data = {
        plan_id: $(this).data('id'),
        price: $(this).data('plan-price')
      };
      $.post(makePaymentURL, data).done(function (result) {
        var toastMessageData = {
          'toastType': 'success',
          'toastMessage': result.message
        };
        paymentMessage(toastMessageData);
        setTimeout(function () {
          location.reload();
        }, 5000);
      })["catch"](function (error) {
        $(_this).html(subscribeText).removeClass('disabled');
        $('.freePayment').attr('disabled', false);
        var toastMessageData = {
          'toastType': 'error',
          'toastMessage': error.responseJSON.message
        };
        paymentMessage(toastMessageData);
      });
      return true;
    }
  });
});
/******/ })()
;