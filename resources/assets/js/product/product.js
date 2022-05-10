'use strict';

$(document).ready(function () {
    let tableName = '#productTable';

    $(document).on('click', '.delete-btn', function (event) {
        let productId = $(event.currentTarget).data('id');
        deleteItem(route('products.destroy', productId), tableName, 'Product');
    });
});

