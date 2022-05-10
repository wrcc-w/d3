<?php

namespace App\Http\Controllers;

use App\Models\Notification;
use App\Models\Subscription;
use App\Models\SubscriptionPlan;
use App\Models\Transaction;
use App\Repositories\SubscriptionRepository;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Laracasts\Flash\Flash;
use PayPalCheckoutSdk\Core\PayPalHttpClient;
use PayPalCheckoutSdk\Core\ProductionEnvironment;
use PayPalCheckoutSdk\Core\SandboxEnvironment;
use PayPalCheckoutSdk\Orders\OrdersCaptureRequest;
use PayPalCheckoutSdk\Orders\OrdersCreateRequest;
use PayPalHttp\HttpException;
use PayPalHttp\IOException;
use Psr\Container\ContainerExceptionInterface;
use Psr\Container\NotFoundExceptionInterface;

class AdminPaypalController extends Controller
{
    /**
     * @var SubscriptionRepository
     */
    private $subscriptionRepository;

    /**
     * PaypalController constructor.
     * @param SubscriptionRepository $subscriptionRepository
     */
    public function __construct(SubscriptionRepository $subscriptionRepository)
    {
        $this->subscriptionRepository = $subscriptionRepository;
    }

    /**
     * @param  Request  $request
     *
     * @return JsonResponse
     * @throws IOException
     * @throws ContainerExceptionInterface
     * @throws NotFoundExceptionInterface
     *
     * @throws HttpException
     */
    public function onBoard(Request $request)
    {
        $subscriptionsPricingPlan = SubscriptionPlan::findOrFail($request->get('planId'));
        if ($subscriptionsPricingPlan->currency != null && !in_array(strtoupper($subscriptionsPricingPlan->currency),
                getPayPalSupportedCurrencies())) {
            Flash::error('This currency is not supported by PayPal for making payments.');

            if (session('from_pricing') == 'landing.pricing') {
                return response()->json(['url' => route('landing.pricing')]);
            } else {
                return response()->json(['url' => route('subscription.pricing.plans.index')]);
            }
        }

        $data = $this->subscriptionRepository->manageSubscription($request->get('planId'));

        if (!isset($data['plan'])) { // 0 amount plan or try to switch the plan if it is in trial mode
            // returning from here if the plan is free.
            if (isset($data['status']) && $data['status'] == true) {
                return $this->sendSuccess($data['subscriptionPlan']->name.' '.__('messages.subscription_pricing_plans.has_been_subscribed'));
            } else {
                if (isset($data['status']) && $data['status'] == false) {
                    return $this->sendError('Cannot switch to zero plan if trial is available / having a paid plan which is currently active');
                }
            }
        }

        $subscriptionsPricingPlan = $data['plan'];
        $subscription = $data['subscription'];

        $clientId = getSuperAdminPaypalClientId();
        $clientSecret = getSuperAdminPaypalSecret();
        $mode = config('payments.paypal.mode');

        if ($mode == 'live') {
            $environment = new ProductionEnvironment($clientId, $clientSecret);
        } else {
            $environment = new SandboxEnvironment($clientId, $clientSecret);
        }

        $client = new PayPalHttpClient($environment);

        $request = new OrdersCreateRequest();
        $request->prefer('return=representation');
        $request->body = [
            "intent"              => "CAPTURE",
            "purchase_units"      => [
                [
                    "reference_id" => $subscription->id,
                    "amount"       => [
                        "value"         => $data['amountToPay'],
                        "currency_code" => $subscriptionsPricingPlan->currency,
                    ],
                ],
            ],
            "application_context" => [
                "cancel_url" => route('admin.paypal.failed'),
                "return_url" => route('admin.paypal.success'),
            ],
        ];

        $order = $client->execute($request);

        session(['payment_type' => request()->get('payment_type')]);

        return response()->json($order);
    }

    public function failed()
    {
        $subscription = session('subscription_plan_id');
        $subscriptionPlan = Subscription::findOrFail($subscription);
        $subscriptionPlan->delete();

        Flash::error('Unable to process the payment at the moment. Try again later.');
        $toastData = [
            'toastType'    => 'error',
            'toastMessage' => 'Unable to process the payment at the moment. Try again later.',
        ];

        if (session('from_pricing') == 'landing.pricing') {
            return redirect(route('landing.pricing'))->with('toast-data', $toastData);
        } else {
            return redirect(route('subscription.pricing.plans.index'));
        }
    }

    public function success(Request $request)
    {
        $clientId = getSuperAdminPaypalClientId();
        $clientSecret = getSuperAdminPaypalSecret();
        $mode = config('payments.paypal.mode');

        if ($mode == 'live') {
            $environment = new ProductionEnvironment($clientId, $clientSecret);
        } else {
            $environment = new SandboxEnvironment($clientId, $clientSecret);
        }
        $client = new PayPalHttpClient($environment);

        // Here, OrdersCaptureRequest() creates a POST request to /v2/checkout/orders
        $request = new OrdersCaptureRequest($request->get('token'));
        $request->prefer('return=representation');
        try {
            // Call API with your client and get a response for your call
            $response = $client->execute($request);

            // If call returns body in response, you can get the deserialized version from the result attribute of the response
            $subscriptionId = $response->result->purchase_units[0]->reference_id;
            $subscriptionAmount = $response->result->purchase_units[0]->amount->value;
            $transactionID = $response->result->id;     // $response->result->id gives the orderId of the order created above

            $subscriptionPlan = Subscription::with('subscriptionPlan')->where('id', $subscriptionId)->firstOrFail();
            $subscriptionPlan->update(['status' => Subscription::ACTIVE]);
            $subscriptionPlanData = $subscriptionPlan->subscriptionPlan;

            $subscriptionPlanCurrency = getSubscriptionPlanCurrencyIcon($subscriptionPlanData->currency);
            // De-Active all other subscription
            Subscription::whereUserId(getLogInUserId())
                ->where('id', '!=', $subscriptionId)
                ->update([
                    'status' => Subscription::INACTIVE,
                ]);

            $transaction = Transaction::create([
                'transaction_id' => $transactionID,
                'payment_mode' => Transaction::TYPE_PAYPAL,
                'amount' => $subscriptionAmount,
                'user_id' => getLogInUserId(),
                'tenant_id' => Auth::user()->tenant_id,
                'status' => Transaction::PAID,
                'meta' => json_encode($response),
            ]);
            $title = "You successfully received subscription plan amount ".$subscriptionPlanCurrency.$subscriptionAmount." from ".Auth::user()->full_name.".";
            addNotification([
                Notification::NOTIFICATION_TYPE['Subscription Plan Purchased'],
                getSuperAdmin()->id,
                $title,
            ]);

            // updating the transaction id on the subscription table
            $subscription = Subscription::with('subscriptionPlan')->findOrFail($subscriptionId);
            $subscription->update(['transaction_id' => $transaction->id]);

            Flash::success($subscription->subscriptionPlan->name.' '.__('has been subscribed'));
            $toastData = [
                'toastType'    => 'success',
                'toastMessage' => $subscription->subscriptionPlan->name.' '.__('has been subscribed'),
            ];

            if (session('from_pricing') == 'landing.pricing') {
                return redirect(route('landing.pricing'))->with('toast-data', $toastData);
            } else {
                return redirect(route('subscription.pricing.plans.index'));
            }

        } catch (HttpException $ex) {
            echo $ex->statusCode;
            print_r($ex->getMessage());
        }
    }
}
