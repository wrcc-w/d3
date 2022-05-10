/******/ (() => { // webpackBootstrap
/******/ 	"use strict";
var __webpack_exports__ = {};
/*!****************************************************!*\
  !*** ./resources/assets/js/subscribe/subscribe.js ***!
  \****************************************************/


var tableName = '#subscribersTable';
$(document).on('click', '.delete-btn', function () {
  var subscriberId = $(this).attr('data-id');
  deleteItem(route('super.admin.subscribe.destroy', subscriberId), tableName, 'Subscriber');
});
/******/ })()
;