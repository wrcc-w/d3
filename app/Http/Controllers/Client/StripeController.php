<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\AppBaseController;
use App\Models\Invoice;
use App\Repositories\StripeRepository;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Routing\Redirector;
use Laracasts\Flash\Flash;
use Symfony\Component\HttpKernel\Exception\UnprocessableEntityHttpException;

class StripeController extends AppBaseController
{

    /**
     * @var StripeRepository
     */
    private $stripeRepository;

    public function __construct(StripeRepository $stripeRepository)
    {
        $this->stripeRepository = $stripeRepository;
    }

    public function createSession(Request $request)
    {
        $amount = $request->get('amount');
        $invoice = $request->get('invoiceId');
        $payable_amount = $request->get('payable_amount');

        $invoiceId = Invoice::whereId($invoice)->first()->invoice_id;
        $user = $request->user();
        $userEmail = $user->email;

        setStripeApiKey();
        $session = \Stripe\Checkout\Session::create([
            'payment_method_types' => ['card'],
            'customer_email'       => $userEmail,
            'line_items'           => [
                [
                    'price_data'      => [
                        'product_data' => [
                            'name' => 'BILL OF PRODUCT #'.$invoiceId,
                        ],
                        'unit_amount'  => (getCurrencyCode() != 'JPY') ? $amount * 100 : $amount,
                        'currency'     => getCurrencyCode(),
                    ],
                    'quantity'    => 1,
                    'description' => 'BILL OF PRODUCT #'.$invoiceId,
                ],
            ],
            'billing_address_collection' => 'auto',
            'client_reference_id'  => $invoice,
            'mode'                 => 'payment',
            'success_url'          => url('client/payment-success').'?session_id={CHECKOUT_SESSION_ID}',
            'cancel_url'           => url('client/failed-payment?error=payment_cancelled'),
        ]);
        $result = [
            'sessionId' => $session['id'],
        ];

        return $this->sendResponse($result, 'Session created successfully.');
    }

    /**
     * @param  Request  $request
     *
     * @return Application|RedirectResponse|Redirector
     */
    public function paymentSuccess(Request $request)
    {
        $sessionId = $request->get('session_id');

        if (empty($sessionId)) {
            throw new UnprocessableEntityHttpException('session_id required');
        }

        $this->stripeRepository->clientPaymentSuccess($sessionId);

        Flash::success('Payment successfully done.');

        return redirect(route('client.invoices.index'));
    }

    /**
     * @return RedirectResponse
     */
    public function handleFailedPayment(): RedirectResponse
    {
        Flash::error('Your Payment is Cancelled');

        return redirect()->route('client.invoices.index');
    }
}
