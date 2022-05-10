/******/ (() => { // webpackBootstrap
/******/ 	"use strict";
var __webpack_exports__ = {};
/*!************************************************************************!*\
  !*** ./resources/assets/js/super_admin_enquiry/super_admin_enquiry.js ***!
  \************************************************************************/


$(document).on('click', '#resetFilter', function () {
  $('#filter_status').val(2).trigger('change');
});
$(document).on('click', '.delete-btn', function (e) {
  var id = $(e.currentTarget).data('id');
  deleteItem(enquiryUrl + '/' + id, '#superAdminEnquiriesTable', 'Enquiry');
});
/******/ })()
;