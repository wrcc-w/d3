/******/ (() => { // webpackBootstrap
/******/ 	"use strict";
var __webpack_exports__ = {};
/*!***********************************************!*\
  !*** ./resources/assets/js/client/invoice.js ***!
  \***********************************************/


$(document).ready(function () {
  var tables = ['#clientInvoiceTbl'];

  function searchDataTable(tbl, selector) {
    var filterSearch = document.querySelector(selector);
    filterSearch.addEventListener('keyup', function (e) {
      tbl.search(e.target.value).draw();
    });
  } // on click client Invoices view invoice tab


  var activeTab = location.href;
  var tabParameter = activeTab.substring(activeTab.indexOf("?Active") + 8);
  $('.nav-item a[href="#' + tabParameter + '"]').tab('show');
});
/******/ })()
;