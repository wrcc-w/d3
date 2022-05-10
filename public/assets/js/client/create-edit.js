/******/ (() => { // webpackBootstrap
/******/ 	"use strict";
var __webpack_exports__ = {};
/*!***************************************************!*\
  !*** ./resources/assets/js/client/create-edit.js ***!
  \***************************************************/


$(document).ready(function () {
  $('#countryID, #stateID').select2({
    width: '100%'
  });
  $(document).on('change', '#countryId', function () {
    $.ajax({
      url: route('states-list'),
      type: 'get',
      dataType: 'json',
      data: {
        countryId: $(this).val()
      },
      success: function success(data) {
        $('#stateId').empty();
        $('#stateId').select2({
          placeholder: 'Select State',
          allowClear: false
        });
        $('#stateId').append($('<option value=""></option>').text('Select State'));
        $.each(data.data, function (i, v) {
          $('#stateId').append($('<option></option>').attr('value', i).text(v));
        });

        if (isEdit && stateId) {
          $('#stateId').val(stateId).trigger('change');
        }
      }
    });
  });
  $(document).on('change', '#stateId', function () {
    $.ajax({
      url: route('cities-list'),
      type: 'get',
      dataType: 'json',
      data: {
        stateId: $(this).val(),
        country: $('#countryId').val()
      },
      success: function success(data) {
        $('#cityId').empty();
        $('#cityId').select2({
          placeholder: 'Select City',
          allowClear: false
        });
        $.each(data.data, function (i, v) {
          $('#cityId').append($('<option></option>').attr('value', i).text(v));
        });

        if (isEdit && cityId) {
          $('#cityId').val(cityId).trigger('change');
        }
      }
    });
  });

  if (isEdit && countryId) {
    $('#countryId').val(countryId).trigger('change');
  }

  $(document).on('click', '.remove-image', function () {
    defaultAvatarImagePreview('#previewImage', 1);
  });
  $(document).on('submit', '#clientForm, #editClientForm', function () {
    if ($('#error-msg').text() !== '') {
      $('#phoneNumber').focus();
      return false;
    }
  });
});
/******/ })()
;