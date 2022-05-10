/******/ (() => { // webpackBootstrap
/******/ 	"use strict";
var __webpack_exports__ = {};
/*!**************************************************!*\
  !*** ./resources/assets/js/category/category.js ***!
  \**************************************************/


$(document).on('click', '.addCategory', function () {
  $('#addModal').appendTo('body').modal('show');
});
$(document).on('submit', '#addNewForm', function (e) {
  e.preventDefault();
  $.ajax({
    url: route('category.store'),
    type: 'POST',
    data: $(this).serialize(),
    beforeSend: function beforeSend() {
      startLoader();
    },
    success: function success(result) {
      if (result.success) {
        $('#addModal').modal('hide');
        livewire.emit('refreshDatatable');
        displaySuccessMessage(result.message);
      }
    },
    error: function error(result) {
      displayErrorMessage(result.responseJSON.message);
    },
    complete: function complete() {
      stopLoader();
    }
  });
});
$(document).on('hidden.bs.modal', '#addModal', function () {
  resetModalForm('#addNewForm', '#validationErrorsBox');
});
$(document).on('click', '.edit-btn', function (event) {
  var categoryId = $(event.currentTarget).attr('data-id');
  renderData(categoryId);
});

window.renderData = function (id) {
  $.ajax({
    url: route('category.edit', id),
    type: 'GET',
    beforeSend: function beforeSend() {
      startLoader();
    },
    success: function success(result) {
      if (result.success) {
        $('#editCategoryName').val(result.data.name);
        $('#categoryId').val(result.data.id);
        $('#editModal').appendTo('body').modal('show');
      }
    },
    error: function error(result) {
      displayErrorMessage(result.responseJSON.message);
    },
    complete: function complete() {
      stopLoader();
    }
  });
};

$(document).on('submit', '#editForm', function (event) {
  event.preventDefault();
  var id = $('#categoryId').val();
  $.ajax({
    url: route('category.update', {
      category: id
    }),
    type: 'put',
    data: $(this).serialize(),
    beforeSend: function beforeSend() {
      startLoader();
    },
    success: function success(result) {
      if (result.success) {
        displaySuccessMessage(result.message);
        $('#editModal').modal('hide');
        livewire.emit('refreshDatatable');
      }
    },
    error: function error(result) {
      displayErrorMessage(result.responseJSON.message);
    },
    complete: function complete() {
      stopLoader();
    }
  });
});
$(document).on('click', '.delete-btn', function (event) {
  var categoryId = $(event.currentTarget).data('id');
  deleteItem(route('category.destroy', categoryId), '#categoryTbl', 'Category');
});
/******/ })()
;