/******/ (() => { // webpackBootstrap
/******/ 	"use strict";
var __webpack_exports__ = {};
/*!************************************************************************!*\
  !*** ./resources/assets/js/sidebar_menu_search/sidebar_menu_search.js ***!
  \************************************************************************/


$(document).ready(function () {
  $(document).on('keyup', '#menuSearch', function () {
    var value = $(this).val().toLowerCase();
    $('.menu-item').filter(function () {
      $('.no-record').addClass('d-none');
      $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1);
      checkEmpty();
    });
  });

  function checkEmpty() {
    if ($('.menu-item:visible').last().length == 0) {
      $('.no-record').removeClass('d-none');
    }
  }

  $(document).on('click', '.sidebar-aside-toggle', function () {
    if ($(this).hasClass('active') === true) {
      $('.sidebar-search-box').addClass('d-none');
    } else {
      $('.sidebar-search-box').removeClass('d-none');
    }
  });
});
/******/ })()
;