@if ($row->payment_mode == 1) 
    <span data-id="${row.payment_mode}" class="badge badge-light-success fs-7">Stripe</span>
@elseif ($row->payment_mode == 2)
    <span data-id="${row.payment_mode}" class="badge badge-light-primary fs-7">Paypal</span>
@elseif ($row->payment_mode == 3) 
    <span data-id="${row.payment_mode}" class="badge badge-light-danger fs-7">Razorpay</span>
@endif
                
