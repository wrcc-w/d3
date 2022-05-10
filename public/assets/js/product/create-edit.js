/******/ (() => { // webpackBootstrap
/******/ 	"use strict";
var __webpack_exports__ = {};
/*!****************************************************!*\
  !*** ./resources/assets/js/product/create-edit.js ***!
  \****************************************************/


$(document).ready(function () {
  $(document).on('keyup', '#code', function () {
    return $('#code').val(this.value.toUpperCase());
  });
  $(document).on('click', '#autoCode', function () {
    var code = Math.random().toString(36).toUpperCase().substr(2, 6);
    $('#code').val(code);
  });
  $('#categoryId').select2({
    width: '100%'
  });
  $(document).on('click', '.remove-image', function () {
    defaultImagePreview('#previewImage', 1);
  });
});
/******/ })()
;