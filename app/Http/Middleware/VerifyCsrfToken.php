<?php

namespace App\Http\Middleware;

use Illuminate\Foundation\Http\Middleware\VerifyCsrfToken as Middleware;

class VerifyCsrfToken extends Middleware
{
    /**
     * The URIs that should be excluded from CSRF verification.
     *
     * @var array
     */
    protected $except = [
        'client/razorpay-payment-success',
        'client/razorpay-payment-failed',
        'admin/razorpay-payment-success',
        'admin/razorpay-payment-failed',
        'paytm-callback',
    ];
}
