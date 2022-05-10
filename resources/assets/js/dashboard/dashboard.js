'use strict';
$(document).ready(function () {
    let timeRange = $('#time_range')
    const today = moment()
    let start = today.clone().startOf('month')
    let end = today.clone().endOf('month')
    let isPickerApply = false
    
    $(window).on('load', () => {
        loadPaymentViewStatus();
        loadYearlyIncomeChat(start.format('YYYY-MM-D'),
            end.format('YYYY-MM-D'));
        loadInvoiceViewStatus();
    });

    window.loadPaymentViewStatus = () => {
        $.ajax({
            type: 'GET',
            url: route('payment-overview'),
            cache: false,
        }).done(preparePaymentViewStatusChart);
    };

    window.preparePaymentViewStatusChart = (result) => {
        $('#payment-overview-container').html('');
        let data = result.data;
        if (data.total_records === 0) {
            $('#payment-overview-container').empty();
            $('#payment-overview-container').
                append(
                    '<div align="center" class="no-record justify-align-center">' +
                    Lang.get('messages.admin_dashboard.no_record_found') +
                    '</div>')
            return true;
        } else {
            $('#payment-overview-container').html('');
            $('#payment-overview-container').
                append('<canvas id="payment_overview"></canvas>');
        }
        let ctx = document.getElementById('payment_overview').getContext('2d');
        let pieChartData = {
            labels: data.labels,
            datasets: [
                {
                    data: data.dataPoints,
                    backgroundColor: ['#47c363', '#fc544b'],
                }],
        };

        window.myBar = new Chart(ctx, {
            type: 'doughnut',
            data: pieChartData,
            options: {
                legend: {
                    display: true,
                    position: 'bottom',
                    boxWidth: 9,
                },
                plugins: {
                    tooltip: {
                        callbacks: {
                            label: function (context) {
                                return ' ' + currency + ' ' +
                                    context.formattedValue;
                            },
                        },
                    },
                },
            },
        });
    };

    window.loadInvoiceViewStatus = () => {
        $.ajax({
            type: 'GET',
            url: route('invoices-overview'),
            cache: false,
        }).done(prepareInvoiceViewStatusChart);
    };

    window.prepareInvoiceViewStatusChart = (result) => {
        $('#invoice-overview-container').html('');
        let data = result.data;
        if (data.total_paid_invoices === 0 && data.total_unpaid_invoices === 0) {
            $('#invoice-overview-container').empty();
            $('#invoice-overview-container').
                append(
                    '<div align="center" class="no-record justify-align-center">' +
                    Lang.get('messages.admin_dashboard.no_record_found') +
                    '</div>')
            return true;
        } else {
            $('#invoice-overview-container').html('');
            $('#invoice-overview-container').
                append('<canvas id="invoice_overview"></canvas>');
        }
        let ctx = document.getElementById('invoice_overview').getContext('2d');
        let pieChartData = {
            labels: data.labels,
            datasets: [
                {
                    data: data.dataPoints,
                    backgroundColor: ['#1100ff', '#ff0000'],
                }],
        };

        window.myBar = new Chart(ctx, {
            type: 'doughnut',
            data: pieChartData,
            options: {
                legend: {
                    display: true,
                    position: 'bottom',
                    boxWidth: 9,
                },
                plugins: {
                    tooltip: {
                        callbacks: {
                            label: function (context) {
                                return ' '+context.formattedValue;
                            },
                        },
                    },
                },
            },
        });
    };

    timeRange.on('apply.daterangepicker', function (ev, picker) {
        isPickerApply = true
        start = picker.startDate.format('YYYY-MM-D')
        end = picker.endDate.format('YYYY-MM-D');
        loadYearlyIncomeChat(start, end);
    });
    window.cb = function (start, end) {
        $('#time_range').val(start.format('MMM D, YYYY') + ' - ' + end.format('MMM D, YYYY'));
    }

    const lastMonth = moment().startOf('month').subtract(1, 'days')

    timeRange.daterangepicker({
        startDate: start,
        endDate: end,
        opens: 'left',
        showDropdowns: true,
        autoUpdateInput: false,
        ranges: {
            'Today': [moment(), moment()],
            'This Week': [moment().startOf('week'), moment().endOf('week')],
            'Last Week': [
                moment().startOf('week').subtract(7, 'days'),
                moment().startOf('week').subtract(1, 'days')],
            'This Month': [start, end],
            'Last Month': [
                lastMonth.clone().startOf('month'),
                lastMonth.clone().endOf('month')],
        },
    }, cb);
    cb(start, end);

    window.loadYearlyIncomeChat = (startDate, endDate) => {
        $.ajax({
            type: 'GET',
            url: route('yearly-income-chart'),
            dataType: 'json',
            data: {
                start_date: startDate,
                end_date: endDate,
            },
            cache: false,
        }).done(prepareYearlyIncomeViewChart);
    };

    window.prepareYearlyIncomeViewChart = (result) => {
        $('#yearly_income_overview-container').html('');
        let data = result.data;
        if (data.total_records === 0) {
            $('#yearly_income_overview-container').empty();
            $('#yearly_income_overview-container').
                append(
                    '<div align="center" class="no-record justify-align-center">' +
                    Lang.get('messages.admin_dashboard.no_record_found') +
                    '</div>')
            return true;
        } else {
            $('#yearly_income_overview-container').html('');
            $('#yearly_income_overview-container').
                append(
                    '<canvas id="yearly_income_chart_canvas" height="200"></canvas>');
        }
        let ctx = document.getElementById('yearly_income_chart_canvas').
            getContext('2d');
        ctx.canvas.style.height = '500px';

        let myChart = new Chart(ctx, {
            type: 'line',
            data: {
                labels: data.labels,
                datasets: [
                    {
                        label: data.month, // Name the series
                        data: data.yearly_income, // Specify the data values array
                        fill: false,
                        borderColor: '#2196f3', // Add custom color border (Line)
                        backgroundColor: '#2196f3', // Add custom color background (Points and Fill)
                        borderWidth: 2, // Specify bar border width
                    }],
            },
            options: {
                elements: {
                    line: {
                        tension: 0.5,
                    },
                },
                interaction: {
                    mode: 'index',
                    intersect: false,
                },
                plugins: {
                    legend: {
                        display: false,
                        position: 'top',
                    },
                    tooltip: {
                        callbacks: {
                            label: function (context) {
                                return ' ' + currency + ' ' +
                                    number_format(context.formattedValue);
                            },
                        },
                    },
                },
                scales: {
                    y: {
                        beginAtZero: true,
                        grid: {
                            display: false,
                        },
                        ticks: {
                            min: 0,
                            // stepSize: 500,
                            callback: function (label) {
                                return  currency +' '+ number_format(label);
                            },
                        },
                    },
                    x: {
                        beginAtZero: true,
                        grid: {
                            display: false,
                        },
                    },
                },
            },
        });
    };
});
