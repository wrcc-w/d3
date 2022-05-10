'use strict';

$(document).ready(function () {
    $(document).on('click', '.remove-image', function () {
        defaultImagePreview('#previewImage', 1);
        $(this).toggleClass('d-none');
    });
});
