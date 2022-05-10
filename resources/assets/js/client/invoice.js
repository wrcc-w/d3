'use strict';

$(document).ready(function () {

    let tables = ['#clientInvoiceTbl'];
    
    function searchDataTable (tbl, selector) {
        const filterSearch = document.querySelector(selector);
        filterSearch.addEventListener('keyup', function (e) {
            tbl.search(e.target.value).draw();
        });
    }

    // on click client Invoices view invoice tab
     let activeTab = location.href;
     let tabParameter = activeTab.substring(activeTab.indexOf("?Active")+8);
     $('.nav-item a[href="#' + tabParameter + '"]').tab('show');
});
