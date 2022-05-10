/******/ (() => { // webpackBootstrap
/******/ 	"use strict";
var __webpack_exports__ = {};
/*!**************************************************!*\
  !*** ./resources/assets/js/users/create-edit.js ***!
  \**************************************************/


$(document).ready(function () {
  $(document).on('click', '.remove-image', function () {
    defaultImagePreview('#previewImage', 1);
    $(this).toggleClass('d-none');
  });
});
/******/ })()
;