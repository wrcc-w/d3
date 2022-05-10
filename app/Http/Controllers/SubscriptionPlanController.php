<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateSubscriptionPlanRequest;
use App\Http\Requests\UpdateSubscriptionPlanRequest;
use App\Models\Feature;
use App\Models\Subscription;
use App\Models\SubscriptionPlan;
use App\Models\Transaction;
use App\Repositories\SubscriptionPlanRepository;
use Exception;
use Flash;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class SubscriptionPlanController extends AppBaseController
{
    /**
     * @var
     */
    private $subscriptionPlanRepository;

    /**
     * @param SubscriptionPlanRepository $subscriptionPlanRepo
     */
    public function __construct(SubscriptionPlanRepository $subscriptionPlanRepo)
    {
        $this->subscriptionPlanRepository = $subscriptionPlanRepo;
    }

    /**
     * @param Request $request
     *
     * @throws Exception
     *
     * @return Application|Factory|View
     */
    public function index(Request $request)
    {
        $planType = SubscriptionPlan::PLAN_TYPE;

        return view('subscription_plans.index', compact('planType'));
    }

    /**
     * Show the form for creating a new Service.
     * @return Factory|\Illuminate\View\View
     */
    public function create()
    {
        $planType = SubscriptionPlan::PLAN_TYPE;

        return view('subscription_plans.create', compact('planType'));
    }

    /**
     * @param CreateSubscriptionPlanRequest $request
     *
     * @return mixed
     */
    public function store(CreateSubscriptionPlanRequest $request)
    {
        $input = $request->all();
        $this->subscriptionPlanRepository->store($input);
        Flash::success('Subscription Plan created successfully.');

        return redirect(route('subscription-plans.index'));
    }

    /**
     * @param SubscriptionPlan $subscriptionPlan
     *
     * @return mixed
     */
    public function edit(SubscriptionPlan $subscriptionPlan)
    {
        $planType = SubscriptionPlan::PLAN_TYPE;

        return view('subscription_plans.edit',
            compact('subscriptionPlan', 'planType'));
    }

    /**
     * @param UpdateSubscriptionPlanRequest $request
     * @param SubscriptionPlan $subscriptionPlan
     * @return mixed
     */
    public function update(UpdateSubscriptionPlanRequest $request, SubscriptionPlan $subscriptionPlan)
    {
        $input = $request->all();
        $this->subscriptionPlanRepository->update($input, $subscriptionPlan->id);
        Flash::success('Subscription plan updated successfully.');

        return redirect(route('subscription-plans.index'));
    }

    /**
     * @param SubscriptionPlan $subscriptionPlan
     *
     * @return Application|Factory|View
     */
    public function show(SubscriptionPlan $subscriptionPlan)
    {
        $subscriptionPlan->load(['subscription']);

        return view('subscription_plans.show', compact('subscriptionPlan'));
    }

    /**
     * @param SubscriptionPlan $subscriptionPlan
     *
     *
     * @return mixed
     */
    public function destroy(SubscriptionPlan $subscriptionPlan)
    {
        $result = Subscription::where('subscription_plan_id', $subscriptionPlan->id)->where('status',
            Subscription::ACTIVE)->count();
        if ($result > 0) {
            return $this->sendError('Subscription Plan can\'t be deleted.');
        }
        $subscriptionPlan->delete();

        return $this->sendSuccess('Subscription Plan Deleted Successfully.');
    }

    /**
     * @param  Request  $request
     *
     * @throws Exception
     *
     * @return Application|Factory|View
     */
    public function showTransactionsLists(Request $request)
    {
        $paymentTypes = Transaction::PAYMENT_TYPES;

        return view('subscription_transactions.index', compact('paymentTypes'));
    }

    /**
     * @param  Subscription  $subscription
     *
     * @return Application|Factory|View
     */
    public function viewTransaction(Subscription $subscription)
    {
        $subscription->load(['subscriptionPlan', 'user']);

        return view('subscription_transactions.show', compact('subscription'));
    }

    /**
     * @param int $id
     *
     * @return JsonResponse
     */
    public function makePlanDefault($id)
    {
        $defaultSubscriptionPlan = SubscriptionPlan::where('is_default', 1)->first();
        $defaultSubscriptionPlan->update(['is_default' => 0]);
        $subscriptionPlan = SubscriptionPlan::findOrFail($id);
        if ($subscriptionPlan->trial_days == 0) {
            $subscriptionPlan->trial_days = SubscriptionPlan::TRAIL_DAYS;
        }
        $subscriptionPlan->is_default = 1;
        $subscriptionPlan->save();

        return $this->sendSuccess('Default plan changed successfully.');
    }


}
