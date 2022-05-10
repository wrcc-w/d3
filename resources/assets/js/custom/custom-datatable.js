'use strict';

window.handleSearchDatatable = (tbl) => {
    const filterSearch = document.querySelector(
        '[data-datatable-filter="search"]')
    filterSearch.addEventListener('keyup', function (e) {
        tbl.search(e.target.value).draw()
    })
    filterSearch.addEventListener('search', function (e) {
        tbl.search(e.target.value).draw()
    })
};

$.extend($.fn.dataTable.defaults, {
    'paging': true,
    'info': true,
    'ordering': true,
    'autoWidth': false,
    'pageLength': 10,
    'language': {
        'search': '',
        'sSearch': 'Search',
    },
    'preDrawCallback': function () {
        customSearch();
    },
    'fnDrawCallback': function (oSettings) {
        $(`a.paginate_button[data-dt-idx="6"]`).
            text(commafy(oSettings._iRecordsTotal));
    },
});

function customSearch () {
    $('.dataTables_filter input').
        addClass(
            'form-control form-control-lg form-control-solid mb-3 mb-lg-0');
    $('.dataTables_filter input').attr('placeholder', 'Search');
}

function commafy (num) {
    var str = num.toString().split('.');
    if (str[0].length >= 5) {
        str[0] = str[0].replace(/(\d)(?=(\d{3})+$)/g, '$1,');
    }
    if (str[1] && str[1].length >= 5) {
        str[1] = str[1].replace(/(\d{3})/g, '$1 ');
    }
    return str.join('.');
}
