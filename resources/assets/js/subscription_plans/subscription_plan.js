'use strict'

$(document).ready(function () {
    $(document).on('click', '#resetFilter', function () {
        $('#planTypeFilter').val('').trigger('change')
        livewire.emit('refreshDatatable');
    })

    $(document).on('click', '.delete-btn', function (e) {
        let subscriptionId = $(this).data('id')
        let deleteSubscriptionUrl = subscriptionPlanUrl + '/' +
            subscriptionId
        deleteItem(deleteSubscriptionUrl, '#subscriptionPlanTable',
            'Subscription Plan')
    })

    $(document).on('change', '.is_default', function (event) {
        let subscriptionPlanId = $(event.currentTarget).data('id')
        livewire.emit('refreshDatatable');
        updateStatusToDefault(subscriptionPlanId)

    })

    window.updateStatusToDefault = function (id) {
        $.ajax({
            url: subscriptionPlanUrl + '/' + id + '/make-plan-as-default',
            method: 'post',
            cache: false,
            success: function (result) {
                if (result.success) {
                    displaySuccessMessage(result.message)
                }
            },
        })
    }
})
