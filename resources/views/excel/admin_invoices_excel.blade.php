<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Invoice Excel</title>

</head>
<body>
@php
    $styleCss = 'style';
@endphp
<table>
    <thead>
    <tr>
        <th {{$styleCss}}="width: 200%"><b>Invoice Id</b></th>
        <th {{$styleCss}}="width: 200%"><b>Client Name</b></th>
        <th {{$styleCss}}="width: 300%"><b>Client Email</b></th>
        <th {{$styleCss}}="width: 150%"><b>Invoice Date</b></th>
        <th {{$styleCss}}="width: 170%"><b>Invoice Amount</b></th>
        <th {{$styleCss}}="width: 150%"><b>Paid Amount</b></th>
        <th {{$styleCss}}="width: 150%"><b>Due Amount</b></th>
        <th {{$styleCss}}="width: 150%"><b>Due Date</b></th>
        <th {{$styleCss}}="width: 150%"><b>Status</b></th>
    </tr>
    </thead>
    <tbody>
    @foreach($invoices as $invoice)
        <tr>
            <td>{{ $invoice->invoice_id }}</td>
            <td>{{ $invoice->client->user->FullName }}</td>
            <td>{{ $invoice->client->user->email }}</td>
            <td>{{ $invoice->invoice_date }}</td>
            <td>{{ $invoice->final_amount }}</td>
            <td>{{ ($invoice->payments->sum('amount') != 0) ? $invoice->payments->sum('amount') : 0 }}</td>
            <td>{{ ($invoice->final_amount - $invoice->payments->sum('amount') != 0 ) ? $invoice->final_amount - $invoice->payments->sum('amount') : 0 }}</td>
            <td>{{ $invoice->due_date }}</td>
            @if($invoice->status == \App\Models\Invoice::DRAFT)
                <td> Draft</td>
            @elseif($invoice->status == \App\Models\Invoice::UNPAID)
                <td> Unpaid</td>
            @elseif($invoice->status == \App\Models\Invoice::PAID)
                <td> Paid</td>
            @elseif($invoice->status == \App\Models\Invoice::Partially)
                <td> Partially Paid</td>
            @elseif($invoice->status == \App\Models\Invoice::OVERDUE)
                <td> Overdue</td>
            @endif
        </tr>
    @endforeach
    </tbody>
</table>

</body>
</html>
