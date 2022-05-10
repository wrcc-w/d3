/******/ (() => { // webpackBootstrap
/******/ 	"use strict";
var __webpack_exports__ = {};
/*!*****************************************************************!*\
  !*** ./resources/assets/js/custom/phone-number-country-code.js ***!
  \*****************************************************************/


var input = document.querySelector('#phoneNumber'),
    errorMsg = document.querySelector('#error-msg'),
    validMsg = document.querySelector('#valid-msg');
var errorMap = ['Invalid number', 'Invalid country code', 'Too short', 'Too long', 'Invalid number']; // initialise plugin

var intl = window.intlTelInput(input, {
  initialCountry: 'IN',
  separateDialCode: true,
  geoIpLookup: function geoIpLookup(success, failure) {
    $.get('https://ipinfo.io', function () {}, 'jsonp').always(function (resp) {
      var countryCode = resp && resp.country ? resp.country : '';
      success(countryCode);
    });
  },
  utilsScript: utilsScript
});

var reset = function reset() {
  input.classList.remove('error');
  errorMsg.innerHTML = '';
  errorMsg.classList.add('hide');
  validMsg.classList.add('hide');
};

input.addEventListener('blur', function () {
  reset();

  if (input.value.trim()) {
    if (intl.isValidNumber()) {
      validMsg.classList.remove('hide');
    } else {
      input.classList.add('error');
      var errorCode = intl.getValidationError();
      errorMsg.innerHTML = errorMap[errorCode];
      errorMsg.classList.remove('hide');
    }
  }
}); // on keyup / change flag: reset

input.addEventListener('change', reset);
input.addEventListener('keyup', reset);

if (typeof phoneNo != 'undefined' && phoneNo !== '') {
  setTimeout(function () {
    $('#phoneNumber').trigger('change');
  }, 500);
}

$(document).on('blur keyup change countrychange', '#phoneNumber', function () {
  if (typeof phoneNo != 'undefined' && phoneNo !== '') {
    intl.setNumber('+' + phoneNo);
    phoneNo = '';
  }

  var getCode = intl.selectedCountryData['dialCode'];
  $('#prefix_code').val(getCode);
});

if (isEdit) {
  var getCode = intl.selectedCountryData['dialCode'];
  $('#prefix_code').val(getCode);
}

var getPhoneNumber = $('#phoneNumber').val();
var removeSpacePhoneNumber = getPhoneNumber.replace(/\s/g, '');
$('#phoneNumber').val(removeSpacePhoneNumber);
$(document).ready(function () {
  $(document).on('submit', '#userCreateForm', function () {
    if ($('#error-msg').text() !== '') {
      $('#phoneNumber').focus();
      return false;
    }
  });
  $(document).on('submit', '#userEditForm', function () {
    if ($('#error-msg').text() !== '') {
      $('#phoneNumber').focus();
      return false;
    }
  });
  $(document).on('submit', '#kt_account_profile_details_form', function () {
    if ($('#error-msg').text() !== '') {
      $('#phoneNumber').focus();
      return false;
    }
  });
  $(document).on('submit', '#createSetting', function () {
    if ($('#error-msg').text() !== '') {
      $('#phoneNumber').focus();
      return false;
    }
  });
});
/******/ })()
;