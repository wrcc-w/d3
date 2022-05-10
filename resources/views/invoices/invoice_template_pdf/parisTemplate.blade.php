<!DOCTYPE HTML>
<html lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
    <link rel="icon" href="{{ asset('web/media/logos/favicon.ico') }}" type="image/png">
    <title>{{ __('messages.invoice.invoice_pdf') }}</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link href="{{ asset('assets/css/bootstrap.min.css') }}" rel="stylesheet" type="text/css"/>
    <link href="{{ asset('assets/css/invoice-pdf.css') }}" rel="stylesheet" type="text/css"/>
    <style>
        * {
            font-family: DejaVu Sans, Arial, "Helvetica", Arial, "Liberation Sans", sans-serif;
        }

        @if(getCurrencySymbol() == '€')
        .euroCurrency {
            font-family: Arial, "Helvetica", Arial, "Liberation Sans", sans-serif;
        }
        @endif
    </style>
</head>
<body>
@php $styleCss = 'style'; @endphp
<table width="100%">
    <tr>
        <td colspan="2">
            <div class="main-heading"
            {{$styleCss}}="border-bottom: 10px solid {{ $invoice_template_color }};margin-right: 50%">INVOICE
            </div>
        </td>
        <td width="250px">
            <div class="logo"><img width="150px" src="{{ getLogoUrl() }}" alt=""></div>
        </td>
    </tr>
</table>
<br>
<table width="100%">
    <thead>
    <tr>
        <td class="vertical-align-top">
            <strong {{$styleCss}}="color: {{ $invoice_template_color }}">From :</strong><br>
            <span>{{ html_entity_decode($setting['app_name']) }}</span><br>
            <b>Address:&nbsp;</b>{{ $setting['company_address'] }}<br>
            <b>Mo:&nbsp;</b>{{ $setting['company_phone'] }}
        </td>
        <td class="vertical-align-top" width="270px">
            <strong class="tu">Invoice Id:&nbsp;</strong>#{{ $invoice->invoice_id }}<br>
            <strong>Invoice
                Date:&nbsp;</strong>{{\Carbon\Carbon::parse($invoice->invoice_date)->format(currentDateFormat()) }}<br>
            <strong>Due Date:&nbsp;</strong>{{\Carbon\Carbon::parse($invoice->due_date)->format(currentDateFormat()) }}
        </td>
    </tr>
    <tr>
        <td class="vertical-align-top">
            <br>
            <strong class="to-font-size" {{$styleCss}}="color: {{ $invoice_template_color }}">To:</strong><br>
            <b>Name:&nbsp;</b>{{ $client->user->full_name }}<br>
            <b>Email:&nbsp;</b>{{ $client->user->email }}
        </td>
    </tr>
    </thead>
</table>
<table width="100%">
    <tr class="invoice-items">
        <td colspan="2">
            <table class="items-table">
                <thead {{ $styleCss }}="border-top: 2px solid {{ $invoice_template_color }}
                ;border-bottom: 2px solid {{ $invoice_template_color }};">
                <tr class="tu" {{ $styleCss }}="color: {{ $invoice_template_color }};">
                <th>#</th>
                <th>{{ __('messages.product.product') }}</th>
                <th class="number-align">{{ __('messages.invoice.qty') }}</th>
                <th class="number-align">{{ __('messages.product.unit_price') }}</th>
                <th class="number-align">{{ __('messages.invoice.tax').' (in %)' }}</th>
                <th class="number-align">{{ __('messages.invoice.amount') }}</th>
                </tr>
                </thead>
                <tbody>
                @if(isset($invoice) && !empty($invoice))
                    @foreach($invoice->invoiceItems as $key => $invoiceItems)
                        <tr>
                            <td>{{ $key + 1 }}</td>
                            <td>{{ isset($invoiceItems->product->name)?$invoiceItems->product->name:$invoiceItems->product_name??'N/A' }}</td>
                            <td class="number-align">{{ $invoiceItems->quantity }}</td>
                            <td class="number-align"><b
                                        class="euroCurrency">{{getCurrencySymbol()}}</b>&nbsp;{{ numberFormat($invoiceItems->price)??'N/A' }}
                            </td>
                            <td class="number-align">
                                @foreach($invoiceItems->invoiceItemTax as $keys => $tax)
                                    {{ $tax->tax ?? 'N/A' }}
                                    @if (!$loop->last)
                                        ,
                                    @endif
                                @endforeach
                            </td>
                            <td class="number-align"><b
                                        class="euroCurrency">{{getCurrencySymbol()}}</b>&nbsp;{{ numberFormat($invoiceItems->total)??'N/A' }}
                            </td>
                        </tr>
                    @endforeach
                @endif
                </tbody>
            </table>
        </td>
    </tr>
    <tr>
        <td></td>
        <td>
            <table class="invoice-footer">
                <tr>
                    <td class="font-weight-bold tu">Amount:</td>
                    <td class="text-nowrap">
                        <b class="euroCurrency">{{ getCurrencySymbol() }}</b>&nbsp;{{ numberFormat($invoice->amount) }}
                    </td>
                </tr>
                <tr>
                    <td class="font-weight-bold tu">Discount:</td>
                    <td class="text-nowrap">
                        @if($invoice->discount == 0)
                            <span>N/A</span>
                        @else
                            @if(isset($invoice) && $invoice->discount_type == \App\Models\Invoice::FIXED)
                                <b class="euroCurrency">{{ getCurrencySymbol() }}</b>
                                &nbsp;{{ numberFormat($invoice->discount) ?? 0 }}
                            @else
                                {{ $invoice->discount }}<span {{ $styleCss }}="font-family: DejaVu Sans">&#37;</span>
                            @endif
                        @endif
                    </td>
                </tr>
                <tr>
                    <td class="font-weight-bold tu">Tax:</td>
                    <td class="text-nowrap">
                        {!!   (numberFormat(array_sum($totalTax)) != 0 ) ? '<b class="euroCurrency">'.getCurrencySymbol().'</b>&nbsp;' . numberFormat(array_sum($totalTax)) 
                        :'N/A' !!}
                    </td>
                </tr>
                <tr>
                    <td class="font-weight-bold tu">Total:</td>
                    <td class="text-nowrap" {{ $styleCss }}="color: {{ $invoice_template_color }}">
                    <b class="euroCurrency">{{ getCurrencySymbol() }}</b>&nbsp;{{ numberFormat($invoice->final_amount) }}
                    </td>
                </tr>
            </table>
        </td>
    </tr>
    <tr>
        <td>
            <table class="w-100">
                <tr>
                    <td>
                        <strong>{{ __('messages.client.notes') }} :</strong>
                        <p class="font-color-gray">{!! nl2br(($invoice->note ?? 'N/A')) !!}</p>
                    </td>
                </tr>
                <tr>
                    <td>
                        <strong>{{ __('messages.invoice.terms') }} :</strong><br>
                        <p class="font-color-gray">{!! nl2br(($invoice->term ?? 'N/A')) !!}</p>
                    </td>
                </tr>
            </table>
            <br>
        </td>
    </tr>
    <tr>
        <td colspan="2" class="vertical-align-bottom">
            <br><strong>Regards</strong>
            <br><span {{ $styleCss }}="color: {{ $invoice_template_color }}">{{ $setting['app_name'] }}</span>
        </td>
    </tr>
</table>
</body>
</html>
