<?php

return [


    'paypal' => [
        'mode'          => env('PAYPAL_MODE', 'sandbox'),
        'client_id'     => env('PAYPAL_CLIENT_ID'),
        'client_secret' => env('PAYPAL_SECRET'),


        'payment_action' => env('PAYPAL_PAYMENT_ACTION', 'Sale'), // Can only be 'Sale', 'Authorization' or 'Order'
        'currency'       => env('PAYPAL_CURRENCY', 'USD'),
        'notify_url'     => env('PAYPAL_NOTIFY_URL', ''), // Change this accordingly for your application.
        'locale'         => env('PAYPAL_LOCALE', 'en_US'),
        // force gateway language  i.e. it_IT, es_ES, en_US ... (for express checkout only)
        'validate_ssl'   => env('PAYPAL_VALIDATE_SSL', true), // Validate SSL when creating api client.
    ],


    'authorize' => [
        'login_id'        => env('AUTHORIZE_LOGIN_ID'),
        'transaction_key' => env('AUTHORIZE_TRANSACTION_KEY'),
    ],

    'paytm-wallet' => [
        'env'              => env('PAYTM_ENVIRONMENT'),
        'merchant_id'      => env('PAYTM_MERCHANT_ID'),
        'merchant_key'     => env('PAYTM_MERCHANT_KEY'),
        'merchant_website' => env('PAYTM_MERCHANT_WEBSITE'),
        'channel'          => env('PAYTM_CHANNEL'),
        'industry_type'    => env('PAYTM_INDUSTRY_TYPE'),
    ],

    'razorpay' => [
        'key'    => env('RAZORPAY_KEY'),
        'secret' => env('RAZORPAY_SECRET'),
    ],
];
