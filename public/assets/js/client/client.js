/******/ (() => { // webpackBootstrap
/******/ 	"use strict";
var __webpack_exports__ = {};
/*!**********************************************!*\
  !*** ./resources/assets/js/client/client.js ***!
  \**********************************************/


var tableName = '#clientTable';
$(document).on('click', '.delete-btn', function (event) {
  var recordId = $(event.currentTarget).data('id');
  deleteItem(route('clients.destroy', recordId), tableName, 'Client');
});
/******/ })()
;