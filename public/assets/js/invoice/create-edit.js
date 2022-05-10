/******/ (() => { // webpackBootstrap
/******/ 	"use strict";
var __webpack_exports__ = {};
/*!****************************************************!*\
  !*** ./resources/assets/js/invoice/create-edit.js ***!
  \****************************************************/


$('input:text:not([readonly="readonly"])').first().blur();
$(document).ready(function () {
  'use strict';

  var discountType = null;
  var momentFormat = convertToMomentFormat(currentDateFormat);
  $(document).ready(function () {
    $(document).on('keyup', '#invoiceId', function () {
      return $('#invoiceId').val(this.value.toUpperCase());
    });
    $('.product').select2({
      tags: true
    });
    $('#client_id').select2('close');
    $('.tax').select2({
      placeholder: 'Select TAX'
    });

    if (invoiceNote == true || invoiceTerm == true) {
      $('#addNote').hide();
      $('#removeNote').show();
      $('#noteAdd').show();
      $('#termRemove').show();
    } else {
      $('#removeNote').hide();
      $('#noteAdd').hide();
      $('#termRemove').hide();
    }

    if (invoiceRecurring == true) {
      $('.recurring').show();
    } else {
      $('.recurring').hide();
    }

    if ($('#formData_recurring-1').prop('checked')) {
      $('.recurring').hide();
    }

    if ($('#discountType').val() != 0) {
      $('#discount').removeAttr('disabled');
    } else {
      $('#discount').attr('disabled', 'disabled');
    }

    calculateTax();
    calculateAndSetInvoiceAmount();
  });
  $(document).on('click', '#addNote', function () {
    $('#addNote').hide();
    $('#removeNote').show();
    $('#noteAdd').show();
    $('#termRemove').show();
  });
  $(document).on('click', '#removeNote', function () {
    $('#addNote').show();
    $('#removeNote').hide();
    $('#noteAdd').hide();
    $('#termRemove').hide();
    $('#note').val('');
    $('#term').val('');
  });
  $(document).on('click', '#formData_recurring-0', function () {
    if ($("#formData_recurring-0").prop("checked")) {
      $('.recurring').show();
    } else {
      $('.recurring').hide();
    }
  });
  $(document).on('click', '#formData_recurring-1', function () {
    if ($("#formData_recurring-1").prop("checked")) {
      $('.recurring').hide();
    }
  });
  $('#client_id').focus();
  var dueDateFlatPicker = $("#due_date").flatpickr({
    defaultDate: moment().add(1, 'days').toDate(),
    dateFormat: currentDateFormat
  });
  var editDueDateFlatPicker = $('#editDueDate').flatpickr({
    dateFormat: currentDateFormat,
    defaultDate: moment($('#editDueDate').val()).format(momentFormat)
  });
  $('#invoice_date').flatpickr({
    defaultDate: new Date(),
    dateFormat: currentDateFormat,
    onChange: function onChange(selectedDates, dateStr, instance) {
      var minDate = moment($('#invoice_date').val(), momentFormat).add(1, 'days').format(momentFormat);

      if (typeof dueDateFlatPicker != 'undefined') {
        dueDateFlatPicker.set('minDate', minDate);
      }
    },
    onReady: function onReady() {
      var minDate = moment(new Date()).add(1, 'days').format(momentFormat);

      if (typeof dueDateFlatPicker != 'undefined') {
        dueDateFlatPicker.set('minDate', minDate);
      }
    }
  });
  $('#editInvoiceDate').flatpickr({
    dateFormat: currentDateFormat,
    defaultDate: moment($('#editInvoiceDate').val()).format(momentFormat),
    onChange: function onChange() {
      var minDate = moment($('#editInvoiceDate').val(), momentFormat).add(1, 'days').format(momentFormat);

      if (typeof editDueDateFlatPicker != 'undefined') {
        editDueDateFlatPicker.set('minDate', minDate);
      }
    },
    onReady: function onReady() {
      var minDate = moment($('#editInvoiceDate').val(), momentFormat).add(1, 'days').format(momentFormat);

      if (typeof editDueDateFlatPicker != 'undefined') {
        editDueDateFlatPicker.set('minDate', minDate);
      }
    }
  });
  $(document).on('change', '#discountType', function () {
    discountType = $(this).val();
    $('#discount').val(0);

    if (discountType == 1 || discountType == 2) {
      $('#discount').removeAttr('disabled');

      if (discountType == 2) {
        var value = $('#discount').val();
        $('#discount').val(value.substring(0, 2));
      }
    } else {
      $('#discount').attr('disabled', 'disabled');
      $('#discount').val(0);
      $('#discountAmount').text('0');
    }

    calculateDiscount();
  });

  window.isNumberKey = function (evt, element) {
    var charCode = evt.which ? evt.which : event.keyCode;
    return !((charCode !== 46 || $(element).val().indexOf('.') !== -1) && (charCode < 48 || charCode > 57));
  };

  $(document).on('click', '#addItem', function () {
    var data = {
      'products': products,
      'taxes': taxes
    };
    var invoiceItemHtml = prepareTemplateRender('#invoiceItemTemplate', data);
    $('.invoice-item-container').append(invoiceItemHtml);
    $('.taxId').select2({
      placeholder: 'Select TAX',
      multiple: true
    });
    $('.productId').select2({
      placeholder: 'Select Product or Enter free text',
      tags: true
    });
    resetInvoiceItemIndex();
  });

  var resetInvoiceItemIndex = function resetInvoiceItemIndex() {
    var index = 1;
    $('.invoice-item-container>tr').each(function () {
      $(this).find('.item-number').text(index);
      index++;
    });

    if (index - 1 == 0) {
      var data = {
        'products': products,
        'taxes': taxes
      };
      var invoiceItemHtml = prepareTemplateRender('#invoiceItemTemplate', data);
      $('.invoice-item-container').append(invoiceItemHtml);
      $('.productId').select2();
      $('.taxId').select2({
        placeholder: 'Select TAX',
        multiple: true
      });
    }

    calculateTax();
  };

  $(document).on('click', '.delete-invoice-item', function () {
    $(this).parents('tr').remove();
    resetInvoiceItemIndex();
    calculateAndSetInvoiceAmount();
  });
  $(document).on('change', '.product', function () {
    var productId = $(this).val();

    if (isEmpty(productId)) {
      productId = 0;
    }

    var element = $(this);
    $.ajax({
      url: route('invoices.get-product', productId),
      type: 'get',
      dataType: 'json',
      success: function success(result) {
        if (result.success) {
          var price = '';
          $.each(result.data, function (id, productPrice) {
            if (id === productId) price = productPrice;
          });
          element.parent().parent().find('td .price').val(price);
          element.parent().parent().find('td .qty').val(1);
          $('.price').trigger('keyup');
        }
      },
      error: function error(result) {
        displayErrorMessage(result.responseJSON.message);
      }
    });
  });
  $(document).on('change', '.tax', function () {
    var tax = $(this).val(); // if (isNaN(tax)) {
    //     tax = 0;
    // }

    var total_tax = 0;
    $.each(tax, function (index, value) {
      total_tax += parseFloat(value);
    });
    var qty = $(this).parent().siblings().find('.qty').val();
    var rate = $(this).parent().siblings().find('.price').val();
    rate = parseFloat(removeCommas(rate));
    var amount = calculateAmount(qty, rate, total_tax);
    calculateTax();
    $(this).parent().siblings('.item-total').text(addCommas(amount.toFixed(2).toString()));
    calculateAndSetInvoiceAmount();
  });
  $(document).on('keyup', '.qty', function () {
    var qty = parseInt($(this).val());
    var tax = $(this).parent().siblings().find('.tax').val();
    var total_tax = 0;
    $.each(tax, function (index, value) {
      total_tax += +value;
    });
    var rate = $(this).parent().siblings().find('.price').val();
    rate = parseFloat(removeCommas(rate));
    var amount = calculateAmount(qty, rate, total_tax);
    calculateTax();
    $(this).parent().siblings('.item-total').text(addCommas(amount.toFixed(2).toString()));
    calculateAndSetInvoiceAmount();
  });
  $(document).on('keyup', '.price', function () {
    var rate = $(this).val();
    rate = parseFloat(removeCommas(rate)); //let tax = parseFloat($(this).parent().siblings().find('.tax').val());

    var tax = $(this).parent().siblings().find('.tax').val();
    var total_tax = 0;
    $.each(tax, function (index, value) {
      total_tax += +value;
    });
    var qty = parseInt($(this).parent().siblings().find('.qty').val());
    var amount = calculateAmount(qty, rate, total_tax);
    calculateTax();
    $(this).parent().siblings('.item-total').text(addCommas(amount.toFixed(2).toString()));
    calculateAndSetInvoiceAmount();
  });

  var calculateAmount = function calculateAmount(qty, rate, tax) {
    if (qty > 0 && rate > 0) {
      var price = qty * rate;
      var allTax = price + price * tax / 100;

      if (isNaN(allTax)) {
        return price;
      }

      return allTax;
    } else {
      return 0;
    }
  };

  var calculateTax = function calculateTax() {
    var taxData = [];
    $('.qty').each(function () {
      var qty = $(this).val();
      var price = $(this).parent().next().children().val();
      var tax = $(this).parent().next().next().children().val();
      var total_tax = 0;
      $.each(tax, function (index, value) {
        total_tax += +value;
      });
      var itemTax = qty * price * total_tax / 100;
      taxData.push(itemTax);
    });
    $('#totalTax').empty();
    $('#totalTax').append(number_format(taxData.reduce(function (a, b) {
      return a + b;
    }, 0)));
  };

  var calculateAndSetInvoiceAmount = function calculateAndSetInvoiceAmount() {
    var totalAmount = 0;
    $('.invoice-item-container>tr').each(function () {
      var itemTotal = $(this).find('.item-total').text();
      itemTotal = removeCommas(itemTotal);
      itemTotal = isEmpty($.trim(itemTotal)) ? 0 : parseFloat(itemTotal);
      totalAmount += itemTotal;
    });
    totalAmount = parseFloat(totalAmount);

    if (isNaN(totalAmount)) {
      totalAmount = 0;
    }

    $('#total').text(addCommas(totalAmount.toFixed(2))); //set hidden input value

    $('#total_amount').val(totalAmount);
    calculateDiscount();
  };

  var calculateDiscount = function calculateDiscount() {
    var discount = $('#discount').val();
    discountType = $('#discountType').val();
    var itemAmount = [];
    var i = 0;
    $(".item-total").each(function () {
      itemAmount[i++] = $.trim(removeCommas($(this).text()));
    });

    $.sum = function (arr) {
      var r = 0;
      $.each(arr, function (i, v) {
        r += +v;
      });
      return r;
    };

    var totalAmount = $.sum(itemAmount);
    $('#total').text(number_format(totalAmount));

    if (isEmpty(discount) || isEmpty(totalAmount)) {
      discount = 0;
    }

    var discountAmount = 0;
    var finalAmount = totalAmount - discountAmount;

    if (discountType == 1) {
      discountAmount = discount;
      finalAmount = totalAmount - discountAmount;
    } else if (discountType == 2) {
      discountAmount = totalAmount * discount / 100;
      finalAmount = totalAmount - discountAmount;
    }

    $('#finalAmount').text(number_format(finalAmount));
    $('#total_amount').val(finalAmount.toFixed(2));
    $('#discountAmount').text(number_format(discountAmount));
  };

  $(document).on('keyup', '#discount', function (e) {
    var value = $(this).val();

    if (discountType == 2 && value > 100) {
      displayErrorMessage('On Percentage you can only give maximum 100% discount');
      $(this).val(value.slice(0, -1));
      return false;
    }

    calculateDiscount();
  });
  $(document).on('click', '#saveAsDraft,#saveAndSend', function (event) {
    event.preventDefault();
    var tax_id = [];
    var i = 0;
    var tax = [];
    var j = 0;
    $('.tax-tr').each(function () {
      var data = $(this).find('.tax option:selected').map(function () {
        return $(this).data('id');
      }).get();

      if (data != '') {
        tax_id[i++] = data;
      } else {
        tax_id[i++] = 0;
      }

      var val = $(this).find('.tax option:selected').map(function () {
        return $(this).val();
      }).get();

      if (val != '') {
        tax[j++] = val;
      } else {
        tax[j++] = 0;
      }
    });
    var invoiceStates = $(this).data('status');
    var myForm = document.getElementById('invoiceForm');
    var formData = new FormData(myForm);
    formData.append('status', invoiceStates);
    formData.append('tax_id', JSON.stringify(tax_id));
    formData.append('tax', JSON.stringify(tax));

    if (invoiceStates == 1) {
      var swalWithBootstrapButtons = Swal.mixin({
        customClass: {
          confirmButton: 'swal2-confirm btn fw-bold btn-danger mt-0',
          cancelButton: 'swal2-cancel btn fw-bold btn-bg-light btn-color-primary mt-0'
        },
        buttonsStyling: false
      });
      swalWithBootstrapButtons.fire({
        title: 'Send Invoice !',
        text: 'Are you sure want to send this invoice to client ?',
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#009ef7',
        cancelButtonText: 'No, Cancel',
        confirmButtonText: 'Yes, Send'
      }).then(function (result) {
        if (result.isConfirmed) {
          screenLock();
          $.ajax({
            url: route('invoices.store'),
            type: 'POST',
            dataType: 'json',
            data: formData,
            processData: false,
            contentType: false,
            beforeSend: function beforeSend() {
              startLoader();
            },
            success: function success(result) {
              displaySuccessMessage(result.message);
              window.location.href = route('invoices.index');
            },
            error: function error(result) {
              displayErrorMessage(result.responseJSON.message);
            },
            complete: function complete() {
              stopLoader();
              screenUnLock();
            }
          });
        }
      });
    } else {
      screenLock();
      $.ajax({
        url: route('invoices.store'),
        type: 'POST',
        dataType: 'json',
        data: formData,
        processData: false,
        contentType: false,
        beforeSend: function beforeSend() {
          startLoader();
        },
        success: function success(result) {
          displaySuccessMessage(result.message);
          window.location.href = route('invoices.index');
        },
        error: function error(result) {
          displayErrorMessage(result.responseJSON.message);
        },
        complete: function complete() {
          stopLoader();
          screenUnLock();
        }
      });
    }
  });
  $(document).on('click', '#editSaveAndSend,#editSave', function (event) {
    event.preventDefault();
    var invoiceStatus = $(this).data('status');
    var tax_id = [];
    var i = 0;
    var tax = [];
    var j = 0;
    $('.tax-tr').each(function () {
      var data = $(this).find('.tax option:selected').map(function () {
        return $(this).data('id');
      }).get();

      if (data != '') {
        tax_id[i++] = data;
      } else {
        tax_id[i++] = 0;
      }

      var val = $(this).find('.tax option:selected').map(function () {
        return $(this).val();
      }).get();

      if (val != '') {
        tax[j++] = val;
      } else {
        tax[j++] = 0;
      }
    });
    var formData = $('#invoiceEditForm').serialize() + '&invoiceStatus=' + invoiceStatus + '&tax_id=' + JSON.stringify(tax_id) + '&tax=' + JSON.stringify(tax);

    if (invoiceStatus == 1) {
      var swalWithBootstrapButtons = Swal.mixin({
        customClass: {
          confirmButton: 'swal2-confirm btn fw-bold btn-danger mt-0',
          cancelButton: 'swal2-cancel btn fw-bold btn-bg-light btn-color-primary mt-0'
        },
        buttonsStyling: false
      });
      swalWithBootstrapButtons.fire({
        title: 'Send Invoice !',
        text: 'Are you sure want to send this invoice to client ?',
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#009ef7',
        cancelButtonText: 'No, Cancel',
        confirmButtonText: 'Yes, Send'
      }).then(function (result) {
        if (result.isConfirmed) {
          screenLock();
          $.ajax({
            url: invoiceUpdateUrl,
            type: 'PUT',
            dataType: 'json',
            data: formData,
            beforeSend: function beforeSend() {
              startLoader();
            },
            success: function success(result) {
              displaySuccessMessage(result.message);
              window.location.href = route('invoices.index');
            },
            error: function error(result) {
              displayErrorMessage(result.responseJSON.message);
            },
            complete: function complete() {
              stopLoader();
              screenUnLock();
            }
          });
        }
      });
    } else if (invoiceStatus == 0) {
      screenLock();
      $.ajax({
        url: invoiceUpdateUrl,
        type: 'PUT',
        dataType: 'json',
        data: formData,
        beforeSend: function beforeSend() {
          startLoader();
        },
        success: function success(result) {
          displaySuccessMessage(result.message);
          window.location.href = route('invoices.index');
        },
        error: function error(result) {
          displayErrorMessage(result.responseJSON.message);
        },
        complete: function complete() {
          stopLoader();
          screenUnLock();
        }
      });
    }
  });
});
/******/ })()
;