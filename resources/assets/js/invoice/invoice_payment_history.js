'use strict';

$(document).ready(function () {
    'use strict';
    
    // payment mail in click after view payment transitions 
    let activeTab = location.href;
    let tabParameter = activeTab.substring(activeTab.indexOf("?active")+8);
    $('.nav-item a[href="#' + tabParameter + '"]').tab('show');
    
    let tables = ['#tblInvoicePaymentHistory'];
    
    function searchDataTable (tbl, selector) {
        const filterSearch = document.querySelector(selector)
        filterSearch.addEventListener('keyup', function (e) {
            tbl.search(e.target.value).draw()
        })
        filterSearch.addEventListener('search', function (e) {
            tbl.search(e.target.value).draw()
        })
    }
});


