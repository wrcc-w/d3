/******/ (() => { // webpackBootstrap
/******/ 	"use strict";
var __webpack_exports__ = {};
/*!***********************************************************!*\
  !*** ./resources/assets/js/subscriptions/subscription.js ***!
  \***********************************************************/


$(document).ready(function () {
  $.ajaxSetup({
    headers: {
      'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
  });
  $(document).on('click', '.makePayment', function () {
    var _this = this;

    if (typeof getLoggedInUserdata != 'undefined' && getLoggedInUserdata == '') {
      window.location.href = logInUrl;
      return true;
    }

    var payloadData = {
      plan_id: $(this).data('id'),
      from_pricing: typeof fromPricing != 'undefined' ? fromPricing : null,
      price: $(this).data('plan-price'),
      payment_type: $('#paymentType option:selected').val()
    };
    $(this).addClass('disabled');
    $.post(makePaymentURL, payloadData).done(function (result) {
      if (typeof result.data == 'undefined') {
        var toastMessageData = {
          'toastType': 'success',
          'toastMessage': result.message
        };
        paymentMessage(toastMessageData);
        setTimeout(function () {
          window.location.href = subscriptionPlans;
        }, 5000);
        return true;
      }

      var sessionId = result.data.sessionId;
      stripe.redirectToCheckout({
        sessionId: sessionId
      }).then(function (result) {
        $(this).html(subscribeText).removeClass('disabled');
        $('.makePayment').attr('disabled', false);
        var toastMessageData = {
          'toastType': 'error',
          'toastMessage': result.responseJSON.message
        };
        paymentMessage(toastMessageData);
      });
    })["catch"](function (error) {
      $(_this).html(subscribeText).removeClass('disabled');
      $('.makePayment').attr('disabled', false);
      var toastMessageData = {
        'toastType': 'error',
        'toastMessage': error.responseJSON.message
      };
      paymentMessage(toastMessageData);
    });
  });
  $('#paymentType').on('change', function () {
    var paymentType = $(this).val();

    if (paymentType == 1) {
      $('.proceed-to-payment, .razorPayPayment').addClass('d-none');
      $('.stripePayment').removeClass('d-none');
    }

    if (paymentType == 2) {
      $('.proceed-to-payment, .razorPayPayment').addClass('d-none');
      $('.paypalPayment').removeClass('d-none');
    }

    if (paymentType == 3) {
      $('.proceed-to-payment, .paypalPayment').addClass('d-none');
      $('.razorPayPayment').removeClass('d-none');
    }
  });
  $('.paymentByPaypal').on('click', function () {
    var pricing = typeof fromPricing != 'undefined' ? fromPricing : null;
    $(this).addClass('disabled');
    $.ajax({
      type: 'GET',
      url: route('admin.paypal.init'),
      data: {
        'planId': $(this).data('id'),
        'from_pricing': pricing,
        'payment_type': $('#paymentType option:selected').val()
      },
      success: function success(result) {
        if (result.url) {
          window.location.href = result.url;
        }

        if (result.statusCode == 201) {
          var redirectTo = '';
          $.each(result.result.links, function (key, val) {
            if (val.rel == 'approve') {
              redirectTo = val.href;
            }
          });
          location.href = redirectTo;
        }
      },
      error: function error(result) {},
      complete: function complete() {}
    });
  }); // RazorPay Payment

  $(document).on('click', '.razor_pay_payment', function () {
    $(this).addClass('disabled');
    $.ajax({
      type: 'POST',
      url: makeRazorpayURl,
      data: {
        'plan_id': $(this).data('id'),
        'from_pricing': typeof fromPricing != 'undefined' ? fromPricing : null
      },
      success: function success(result) {
        if (result.url) {
          window.location.href = result.url;
        }

        if (result.success) {
          var _result$data = result.data,
              id = _result$data.id,
              amount = _result$data.amount,
              name = _result$data.name,
              email = _result$data.email,
              contact = _result$data.contact,
              planID = _result$data.planID;
          options.amount = amount;
          options.order_id = id;
          options.prefill.name = name;
          options.prefill.email = email;
          options.prefill.contact = contact;
          options.prefill.planID = planID;
          var razorPay = new Razorpay(options);
          razorPay.open();
          razorPay.on('payment.failed', storeFailedPayment);
        }
      },
      error: function error(result) {
        displayErrorMessage(result.responseJSON.message);
      },
      complete: function complete() {}
    });
  });

  function storeFailedPayment(response) {
    $.ajax({
      type: 'POST',
      url: razorpayPaymentFailed,
      data: {
        data: response
      },
      success: function success(result) {
        if (result.url) {
          window.location.href = result.url;
        }
      },
      error: function error(result) {
        displayErrorMessage(result.responseJSON.message);
      }
    });
  }
});
/******/ })()
;