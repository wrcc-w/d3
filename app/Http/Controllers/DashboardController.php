<?php

namespace App\Http\Controllers;

use App\Models\Transaction;
use App\Models\User;
use App\Repositories\DashboardRepository;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class DashboardController extends AppBaseController
{
    /* @var DashboardRepository */
    public $dashboardRepository;

    /**
     * DashboardController constructor.
     * @param  DashboardRepository  $dashboardRepo
     */
    public function __construct(DashboardRepository $dashboardRepo)
    {
        $this->dashboardRepository = $dashboardRepo;
    }

    /**
     *
     * @return Application|Factory|View
     */
    public function index()
    {
        $dashboardData = $this->dashboardRepository->getAdminDashboardData();

        return view('dashboard.index')->with($dashboardData);
    }

    /**
     *
     * @return Application|Factory|View
     */
    public function SuperAdminDashboardData()
    {

        $query = User::role('admin')->with('roles')->select('users.*');
        $data['users'] = $query->count();
        $revenue_amount = Transaction::with([
            'transactionSubscription.subscriptionPlan', 'user.media',
        ])->whereHas('transactionSubscription');
        $data['revenue'] = $revenue_amount->sum('amount');

        $subscriptionPlanCount = $this->dashboardRepository->getTotalActiveDeActiveUserPlans();
        $data['activeUserPlan'] = $subscriptionPlanCount['activePlansCount'];
        $data['deActiveUserPlan'] = $subscriptionPlanCount['deActivePlansCount'];

        return view('super_admin.dashboard.index', compact('data'));
    }

    /**
     *
     * @return mixed
     */
    public function paymentOverview()
    {
        $data = $this->dashboardRepository->getPaymentOverviewData();

        return $this->sendResponse($data, 'PaymentOverview Status retrieved successfully.');
    }

    /**
     *
     * @return mixed
     */
    public function invoiceOverview()
    {
        $data = $this->dashboardRepository->getInvoiceOverviewData();

        return $this->sendResponse($data, 'PaymentOverview Status retrieved successfully.');
    }

    /**
     * @param  Request  $request
     *
     * @return JsonResponse
     */
    public function getYearlyIncomeChartData(Request $request): JsonResponse
    {
        $input = $request->all();

        $data = $this->dashboardRepository->prepareYearlyIncomeChartData($input);

        return $this->sendResponse($data, 'Yearly Income Overview chart data retrieved successfully.');
    }
}
