'use strict';

$(document).ready(function () {
    $(document).on('keyup', '#code', function () {
        return $('#code').val(this.value.toUpperCase());
    });
    $(document).on('click', '#autoCode', function () {
        let code = Math.random().toString(36).toUpperCase().substr(2, 6);
        $('#code').val(code);
    });

    $('#categoryId').select2({
        width: '100%',
    });
    $(document).on('click', '.remove-image', function () {
        defaultImagePreview('#previewImage', 1);
    });
});
