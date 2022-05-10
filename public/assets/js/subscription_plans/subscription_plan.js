/******/ (() => { // webpackBootstrap
/******/ 	"use strict";
var __webpack_exports__ = {};
/*!*********************************************************************!*\
  !*** ./resources/assets/js/subscription_plans/subscription_plan.js ***!
  \*********************************************************************/


$(document).ready(function () {
  $(document).on('click', '#resetFilter', function () {
    $('#planTypeFilter').val('').trigger('change');
    livewire.emit('refreshDatatable');
  });
  $(document).on('click', '.delete-btn', function (e) {
    var subscriptionId = $(this).data('id');
    var deleteSubscriptionUrl = subscriptionPlanUrl + '/' + subscriptionId;
    deleteItem(deleteSubscriptionUrl, '#subscriptionPlanTable', 'Subscription Plan');
  });
  $(document).on('change', '.is_default', function (event) {
    var subscriptionPlanId = $(event.currentTarget).data('id');
    livewire.emit('refreshDatatable');
    updateStatusToDefault(subscriptionPlanId);
  });

  window.updateStatusToDefault = function (id) {
    $.ajax({
      url: subscriptionPlanUrl + '/' + id + '/make-plan-as-default',
      method: 'post',
      cache: false,
      success: function success(result) {
        if (result.success) {
          displaySuccessMessage(result.message);
        }
      }
    });
  };
});
/******/ })()
;