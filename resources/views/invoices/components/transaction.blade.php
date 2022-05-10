@php
    $dueAmount = 0;
    $paid = 0;
    foreach ($row->payments as $payment){
        $paid += $payment->amount;
    }
    $dueAmount = $row->final_amount - $paid;
@endphp

@if ($row->final_amount == $paid)
    <span class="badge badge-light-success fs-7">Paid:{{getCurrencySymbol().numberFormat($paid)}}</span><br>
@elseif($row->status == 3)
    <span class="badge badge-light-success fs-7">Paid:{{getCurrencySymbol().numberFormat($paid)}}</span><br>
    <span class="badge badge-light-danger fs-7 mt-1">Due:{{getCurrencySymbol().numberFormat($dueAmount)}}</span>
@else
    <span class="badge badge-light-danger fs-7">Due:{{getCurrencySymbol().numberFormat($dueAmount)}}</span>
@endif
