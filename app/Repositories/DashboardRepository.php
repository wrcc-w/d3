<?php

namespace App\Repositories;

use App\Models\Client;
use App\Models\Invoice;
use App\Models\Payment;
use App\Models\Product;
use App\Models\Subscription;
use Carbon\Carbon;
use Carbon\CarbonPeriod;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use SebastianBergmann\CodeCoverage\Report\Html\Dashboard;

/**
 * Class DashboardRepository
 */
class DashboardRepository
{

    public function getFieldsSearchable()
    {
        // TODO: Implement getFieldsSearchable() method.
    }

    /**
     *
     * @return string
     */
    public function model()
    {
        return Dashboard::class;
    }

    public function getAdminDashboardData()
    {
        $user = Auth::user();
        $invoice = Invoice::all();
        $invoiceIds = $invoice->pluck('id');
        $data['total_invoices'] = $invoice->count();
        $data['total_clients'] = Client::count();
        $data['total_products'] = Product::count();
        $data['paid_invoices'] = $invoice->where('status', Invoice::PAID)->count();
        $data['unpaid_invoices'] = $invoice->where('status', Invoice::UNPAID)->count();
        $data['partially_paid'] = $invoice->where('status', Invoice::Partially)->count();
        $data['overdue_invoices'] = $invoice->where('status', Invoice::OVERDUE)->count();
        $data['paid_amount'] = Payment::whereIn('invoice_id', $invoiceIds)->sum('amount');
        $data['invoice_amount'] = $invoice->where('status', '!=', Invoice::DRAFT)->sum('final_amount');
        $data['due_amount'] = $data['invoice_amount'] - $data['paid_amount'];

        return $data;
    }

    /**
     * @return array
     */
    public function getClientDashboardData(): array
    {
        $clientId = Auth::user()->client->id;
        $invoice = Invoice::whereClientId($clientId)->where('status', '!=', Invoice::DRAFT)->get();
        $data['total_invoices'] = $invoice->count();
        $data['total_products'] = Product::count();
        $data['paid_amount'] = Payment::whereIn('invoice_id', $invoice->pluck('id'))->sum('amount');
        $data['total_payments'] = $invoice->where('status', '!=', Invoice::DRAFT)->sum('final_amount');
        $data['due_amount'] = $data['total_payments'] - $data['paid_amount'];
        $data['paid_invoices'] = $invoice->where('status', Invoice::PAID)->count();
        $data['unpaid_invoices'] = $invoice->where('status', Invoice::UNPAID)->count();

        return $data;
    }

    /**
     *
     * @return array
     */
    public function getPaymentOverviewData(): array
    {
        $user = Auth::user();
        $data = [];
        /** @var Invoice $invoices */
        $invoices = Invoice::all();
        $data['total_records'] = $invoices->count();
        $data['received_amount'] = Payment::sum('amount');
        $data['invoice_amount'] = $invoices->where('status', '!=', Invoice::DRAFT)->sum('final_amount');
        $data['due_amount'] = $data['invoice_amount'] - $data['received_amount'];
        $data['labels'] = [
            Payment::STATUS['RECEIVED_AMOUNT'],
            Payment::STATUS['DUE_AMOUNT'],
        ];
        $data['dataPoints'] = [$data['received_amount'], $data['due_amount']];

        return $data;
    }
    /**
     *
     * @return array
     */
    public function getInvoiceOverviewData(): array
    {
        $user = Auth::user();
        $data = [];
        $invoice = Invoice::all();
        $data['total_paid_invoices'] = $invoice->where('status', Invoice::PAID)->count();
        $data['total_unpaid_invoices'] = $invoice->where('status', Invoice::UNPAID)->count();
        $data['labels'] = [
            'Paid Invoices',
            'Unpaid Invoices',
        ];
        $data['dataPoints'] = [$data['total_paid_invoices'], $data['total_unpaid_invoices']];

        return $data;
    }

    /**
     * @param $input
     *
     * @return array
     */
    public function prepareYearlyIncomeChartData($input): array
    {
        $start_date = Carbon::parse($input['start_date'])->format('Y-m-d');
        $end_date = Carbon::parse($input['end_date'])->format('Y-m-d');

        $income = Payment::whereBetween('payment_date', [date($start_date), date($end_date)])
            ->groupBy('month')
            ->orderBy('month')
            ->get([
                DB::raw('DATE_FORMAT(payment_date,"%b %d") as month'),
                DB::raw('SUM(amount) as total_income'),
            ])->keyBy('month');

        $period = CarbonPeriod::create($start_date, $end_date);
        $labelsData = array_map(function ($datePeriod) {
            return $datePeriod->format("M d");
        }, iterator_to_array($period));

        $incomeOverviewData = array_map(function ($datePeriod) use ($income) {
            $month = $datePeriod->format('M d');

            return $income->has($month) ? $income->get($month)->total_income : 0;
        }, iterator_to_array($period));

        $data['labels'] = $labelsData;
        $data['yearly_income'] = $incomeOverviewData;

        return $data;
    }

    /**
     * @return int[]
     */
    public function getTotalActiveDeActiveUserPlans(): array
    {
        $activePlansCount = 0;
        $deActivePlansCount = 0;
        $subscriptions = Subscription::whereStatus(Subscription::ACTIVE)->get();
        foreach ($subscriptions as $sub) {
            if (!$sub->isExpired()) {   // active plans
                $activePlansCount++;
            } else {
                $deActivePlansCount++;
            }
        }

        return ['activePlansCount' => $activePlansCount, 'deActivePlansCount' => $deActivePlansCount];
    }
}
