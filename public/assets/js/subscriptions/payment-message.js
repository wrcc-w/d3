/******/ (() => { // webpackBootstrap
/******/ 	"use strict";
var __webpack_exports__ = {};
/*!**************************************************************!*\
  !*** ./resources/assets/js/subscriptions/payment-message.js ***!
  \**************************************************************/


window.paymentMessage = function () {
  var data = arguments.length > 0 && arguments[0] !== undefined ? arguments[0] : null;
  toastData = data != null ? data : toastData;

  if (toastData !== null) {
    setTimeout(function () {
      $.toast({
        heading: toastData.toastType,
        icon: toastData.toastType,
        bgColor: '#7603f3',
        textColor: '#ffffff',
        text: toastData.toastMessage,
        position: 'top-right',
        stack: false
      });
    }, 1000);
  }
};

paymentMessage();
/******/ })()
;