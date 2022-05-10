/******/ (() => { // webpackBootstrap
/******/ 	"use strict";
var __webpack_exports__ = {};
/*!************************************************!*\
  !*** ./resources/assets/js/product/product.js ***!
  \************************************************/


$(document).ready(function () {
  var tableName = '#productTable';
  $(document).on('click', '.delete-btn', function (event) {
    var productId = $(event.currentTarget).data('id');
    deleteItem(route('products.destroy', productId), tableName, 'Product');
  });
});
/******/ })()
;