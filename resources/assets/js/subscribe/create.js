'use strict'

$(document).ready(function () {
    $(document).on('click', function (event) {
            var target = $(event.target)
            var _mobileMenuOpen = $('.navbar-collapse').hasClass('show')
            if (_mobileMenuOpen === true && !target.hasClass('navbar-toggler')) {
                $('button.navbar-toggler').click()
            }
        },
    )
})

$(document).on('submit', '#subscribe-form', function (e) {
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
        },
    })
    e.preventDefault()
    $('.ajax-message-subscribe').css('display', 'block')
    $('.ajax-message-subscribe').html('')
    $.ajax({
        url: route('subscribe.store'),
        type: 'POST',
        data: $(this).serialize(),
        success: function (result) {
            if (result.success) {
                $('.ajax-message-subscribe').
                    html('<div class="gen alert alert-success">' +
                        result.message + '</div>').
                    delay(5000).
                    hide('slow')
                $('#subscribe-form')[0].reset()
            }
        },
        error: function (result) {
            $('.ajax-message-subscribe').
                html('<div class="err alert alert-danger">' +
                    result.responseJSON.message + '</div>').
                delay(5000).
                hide('slow')
            $('#subscribe-form')[0].reset()
        },
    })
})
