/******/ (() => { // webpackBootstrap
/******/ 	"use strict";
var __webpack_exports__ = {};
/*!*****************************************************************!*\
  !*** ./resources/assets/js/subscription_plans/plan_features.js ***!
  \*****************************************************************/


$(document).ready(function () {
  window.featureChecked = function (featureLength) {
    var totalFeature = $('.feature:checkbox').length;

    if (featureLength === totalFeature) {
      $('#selectAll').prop('checked', true);
    } else {
      $('#selectAll').prop('checked', false);
    }
  }; // features selection script - starts


  var featureLength = $('.feature:checkbox:checked').length;
  featureChecked(featureLength); // script for selecting all features

  $(document).on('click', '#selectAll', function () {
    if ($('#selectAll').is(':checked')) {
      $('.feature').each(function () {
        $(this).prop('checked', true);
      });
    } else {
      $('.feature').each(function () {
        $(this).prop('checked', false);
      });
    }
  }); // script for selecting single feature

  $(document).on('click', '.feature', function () {
    var featureLength = $('.feature:checkbox:checked').length;
    featureChecked(featureLength);
  }); // features selection script - ends
});
/******/ })()
;