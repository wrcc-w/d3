/******/ (() => { // webpackBootstrap
/******/ 	"use strict";
var __webpack_exports__ = {};
/*!**************************************************************!*\
  !*** ./resources/assets/js/languageChange/languageChange.js ***!
  \**************************************************************/


$(document).ready(function () {
  $(document).on('click', '.languageSelection', function () {
    var changeLanguageName = $(this).attr('data-prefix-value');
    $.ajax({
      headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
      },
      type: 'POST',
      url: '/language-change-name',
      data: {
        languageName: changeLanguageName
      },
      success: function success() {
        location.reload();
      }
    });
  });
});
/******/ })()
;