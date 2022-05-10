/******/ (() => { // webpackBootstrap
/******/ 	"use strict";
var __webpack_exports__ = {};
/*!********************************************!*\
  !*** ./resources/assets/js/users/users.js ***!
  \********************************************/


var tableName = '#usersTable';
$(document).on('change', '.status', function (event) {
  var userId = $(event.currentTarget).data('id');
  updateStatus(userId);
});

window.updateStatus = function (id) {
  $.ajax({
    url: recordsURL + '/' + id + '/active-deactive',
    method: 'post',
    cache: false,
    success: function success(result) {
      if (result.success) {
        displaySuccessMessage(result.message);
        $('#usersTable').DataTable().ajax.reload(null, false);
      }
    }
  });
};

$(document).on('change', '.is-verified', function (event) {
  var userId = $(event.currentTarget).data('id');
  $.ajax({
    url: recordsURL + '/' + userId + '/is-verified',
    method: 'post',
    cache: false,
    success: function success(result) {
      if (result.success) {
        displaySuccessMessage(result.message);
        $('#usersTable').DataTable().ajax.reload(null, false);
      }
    }
  });
});
$(document).on('click', '.delete-btn', function (event) {
  var recordId = $(event.currentTarget).data('id');
  deleteItem(route('users.destroy', recordId), tableName, 'User');
});
/******/ })()
;