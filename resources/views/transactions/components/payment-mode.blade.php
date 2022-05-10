@if ($row->payments_mode === 'Manual') 
<span class="badge badge-light-warning fs-7">{{$row->payments_mode}}</span>
@elseif($row->payments_mode === 'Stripe') 
<span class="badge badge-light-success fs-7">{{$row->payments_mode}}</span>
@elseif($row->payments_mode === 'Paypal')
<span class="badge badge-light-primary fs-7">{{$row->payments_mode}}</span>
@elseif($row->payments_mode === 'Cash')
<span class="badge badge-light-info fs-7">{{$row->payments_mode}}</span>
@elseif($row->payments_mode === 'Razorpay')
<span class="badge badge-light-danger fs-7">{{$row->payments_mode}}</span>
@endif
