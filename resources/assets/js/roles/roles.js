'use strict';

let tableName = '#rolesTable';
$(document).ready(function () {

    let tbl = $(tableName).DataTable({
        processing: true,
        serverSide: true,
        'language': {
            'lengthMenu': 'Show _MENU_',
        },
        'dom':
            '<\'row\'' +
            '<\'col-sm-6 d-flex align-items-center justify-conten-start\'l>' +
            '<\'col-sm-6 d-flex align-items-center justify-content-end\'f>' +
            '>' +

            '<\'table-responsive\'tr>' +

            '<\'row\'' +
            '<\'col-sm-12 col-md-5 d-flex align-items-center justify-content-center justify-content-md-start\'i>' +
            '<\'col-sm-12 col-md-7 d-flex align-items-center justify-content-center justify-content-md-end\'p>' +
            '>',
        'order': [[0, 'asc']],
        ajax: {
            url: route('roles.index'),
        },
        columnDefs: [
            {
                'targets': [0],
                'width': '15%',
            },
            {
                'targets': [2],
                'orderable': false,
                'className': 'text-center',
                'width': '8%',
            },
        ],
        columns: [
            {
                data: 'display_name',
                name: 'display_name',
            },
            {
                data: function (row) {
                    let permissions = '';
                    let colours = [
                        'primary',
                        'danger',
                        'success',
                        'info',
                        'warning',
                        'dark'];
                    $.each(row.permissions, function (index, value) {
                        let item = colours[index % 6];
                        permissions += '<a class="badge badge-light-' + item +
                            ' fs-7 m-1">' + value.display_name;
                        +'</a>';
                    });
                    return permissions;
                },
                name: 'name',
            },
            {
                data: function (row) {
                    let data = [
                        {
                            'id': row.id,
                            'editUrl': route('roles.edit', row.id),
                        },
                    ];
                    if (row.is_default === 1) {
                        return '';
                    } else {
                        return prepareTemplateRender('#actionsTemplates', data);
                    }
                },
                name: 'id',
            },
        ],
    });
    handleSearchDatatable(tbl);
});

$(document).on('click', '.delete-btn', function (event) {
    let recordId = $(event.currentTarget).data('id');
    deleteItem(route('roles.destroy', recordId), tableName, 'Role');
});

$(document).on('click', '#checkAllPermission', function () {
    if ($('#checkAllPermission').is(':checked')) {
        $('.permission').each(function () {
            $(this).prop('checked', true);
        });
    } else {
        $('.permission').each(function () {
            $(this).prop('checked', false);
        });
    }
});

$(document).on('click', '.permission', function () {
    let checkAllLength = $('.permission:checked').length;
    if (checkAllLength === 13) {
        $('#checkAllPermission').prop('checked', true);
    } else {
        $('#checkAllPermission').prop('checked', false);
    }
});
