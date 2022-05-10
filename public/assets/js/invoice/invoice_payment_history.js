/******/ (() => { // webpackBootstrap
/******/ 	"use strict";
var __webpack_exports__ = {};
/*!****************************************************************!*\
  !*** ./resources/assets/js/invoice/invoice_payment_history.js ***!
  \****************************************************************/


$(document).ready(function () {
  'use strict'; // payment mail in click after view payment transitions 

  var activeTab = location.href;
  var tabParameter = activeTab.substring(activeTab.indexOf("?active") + 8);
  $('.nav-item a[href="#' + tabParameter + '"]').tab('show');
  var tables = ['#tblInvoicePaymentHistory'];

  function searchDataTable(tbl, selector) {
    var filterSearch = document.querySelector(selector);
    filterSearch.addEventListener('keyup', function (e) {
      tbl.search(e.target.value).draw();
    });
    filterSearch.addEventListener('search', function (e) {
      tbl.search(e.target.value).draw();
    });
  }
});
/******/ })()
;