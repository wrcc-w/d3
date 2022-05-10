/******/ (() => { // webpackBootstrap
/******/ 	"use strict";
var __webpack_exports__ = {};
/*!*************************************************************!*\
  !*** ./resources/assets/js/super_admin_settings/setting.js ***!
  \*************************************************************/


$(document).on('change', '#appLogo', function () {
  $('#validationErrorsBox').addClass('d-none');

  if (isValidLogo($(this), '#validationErrorsBox')) {
    displayLogo(this, '#previewImage');
  }
});
$(document).on('submit', '#createSetting', function (event) {
  event.preventDefault();
  $('#createSetting')[0].submit();
  return true;
});

window.isValidLogo = function (inputSelector, validationMessageSelector) {
  var ext = $(inputSelector).val().split('.').pop().toLowerCase();

  if ($.inArray(ext, ['jpg', 'png', 'jpeg']) == -1) {
    $(inputSelector).val('');
    $(validationMessageSelector).removeClass('d-none');
    $(validationMessageSelector).html('The image must be a file of type: jpg, jpeg, png.').show();
    return false;
  }

  $(validationMessageSelector).hide();
  return true;
};

window.displayLogo = function (input, selector) {
  var displayPreview = true;

  if (input.files && input.files[0]) {
    var reader = new FileReader();

    reader.onload = function (e) {
      var image = new Image();
      image.src = e.target.result;

      image.onload = function () {
        /*
        if (image.height != 60 && image.width != 90) {
            $(selector).val('');
            $('#validationErrorsBox').removeClass('d-none');
            $('#validationErrorsBox').
                html(imageValidation).
                show();
            return false;
        }
         */
        $(selector).attr('src', e.target.result);
        displayPreview = true;
      };
    };

    if (displayPreview) {
      reader.readAsDataURL(input.files[0]);
      $(selector).show();
    }
  }
};

$(document).on('click', '#resetFilter', function () {
  $('#filter_status').val('2').trigger('change');
});
$(document).on('submit', '#superAdminFooterSettingForm', function (event) {
  event.preventDefault();

  if ($('#error-msg').text() !== '') {
    $('#phoneNumber').focus();
    return false;
  }

  var facebookUrl = $('#facebookUrl').val();
  var twitterUrl = $('#twitterUrl').val();
  var youtubeUrl = $('#youtubeUrl').val();
  var linkedInUrl = $('#linkedInUrl').val();
  var facebookExp = new RegExp(/(?:(?:http|https):\/\/)?(?:www.)?facebook.com\/(?:(?:\w)*#!\/)?(?:pages\/)?(?:[?\w\-]*\/)?(?:profile.php\?id=(?=\d.*))?([\w\-]*)?/i);
  var twitterExp = new RegExp(/http(?:s)?:\/\/(?:www\.)?twitter\.com\/([a-zA-Z0-9_]+)/);
  var youtubeUrlExp = new RegExp(/^(https?\:\/\/)?(www\.youtube\.com|youtu\.be)\/.+$/);
  var linkedInExp = new RegExp(/http(?:s)?:\/\/(?:www\.)?linkedin\.com\/([a-zA-Z0-9_]+)/);
  var facebookCheck = facebookUrl == '' ? true : facebookUrl.match(facebookExp) ? true : false;

  if (!facebookCheck) {
    displayErrorMessage('Please enter a valid Facebook URL');
    return false;
  }

  var youtubeUrlCheck = youtubeUrl == '' ? true : youtubeUrl.match(youtubeUrlExp) ? true : false;

  if (!youtubeUrlCheck) {
    displayErrorMessage('Please enter a valid Youtube URL');
    return false;
  }

  var twitterCheck = twitterUrl == '' ? true : twitterUrl.match(twitterExp) ? true : false;

  if (!twitterCheck) {
    displayErrorMessage('Please enter a valid Twitter URL');
    return false;
  }

  var linkedInCheck = linkedInUrl == '' ? true : linkedInUrl.match(linkedInExp) ? true : false;

  if (!linkedInCheck) {
    displayErrorMessage('Please enter a valid Linkedin URL');
    return false;
  }

  $('#superAdminFooterSettingForm')[0].submit();
  return true;
});
$(document).ready(function () {
  if (typeof phoneNo != 'undefined' && phoneNo !== '') $('#phoneNumber').trigger('blur');
});
/******/ })()
;