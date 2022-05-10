<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Client Transaction Excel</title>

</head>
<body>
@php
    $styleCss = 'style';
@endphp
<table>
    <thead>
    <tr>
        <th {{$styleCss}}="width: 170%"><b>Payment Date</b></th>
        <th {{$styleCss}}="width: 170%"><b>Invoice Id</b></th>
        <th {{$styleCss}}="width: 180%"><b>Payment Amount</b></th>
        <th {{$styleCss}}="width: 160%"><b>Payment Mode</b></th>
    </tr>
    </thead>
    <tbody>
    @foreach($transactions as $transaction)
        <tr>
            <td>{{ $transaction->payment_date }}</td>
            <td>{{ $transaction->invoice->invoice_id }}</td>
            <td>{{ $transaction->amount }}</td>
            @if($transaction->payment_mode == \App\Models\Payment::MANUAL)
                <td> Manual</td>
            @elseif($transaction->payment_mode == \App\Models\Payment::STRIPE)
                <td> Stripe</td>
            @elseif($transaction->payment_mode == \App\Models\Payment::PAYPAL)
                <td> Paypal</td>
            @elseif($transaction->payment_mode == \App\Models\Payment::RAZORPAY)
                <td> Razorpay</td>
            @elseif($transaction->payment_mode == \App\Models\Payment::CASH)
                <td> Cash</td>
            @endif
        </tr>
    @endforeach
    </tbody>
</table>

</body>
</html>
