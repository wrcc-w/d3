<?php

namespace App\Http\Controllers;

use App\DataTables\AdminPaymentDataTable;
use App\Exports\AdminPaymentsExport;
use App\Http\Requests\CreateAdminPaymentRequest;
use App\Models\AdminPayment;
use App\Models\Invoice;
use App\Repositories\AdminPaymentRepository;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;
use Symfony\Component\HttpFoundation\BinaryFileResponse;

class AdminPaymentController extends AppBaseController
{

    /** @var  AdminPaymentRepository */
    public $adminPaymentRepository;

    /**
     * @param  AdminPaymentRepository  $adminPaymentRepo
     */
    public function __construct(AdminPaymentRepository $adminPaymentRepo)
    {
        $this->adminPaymentRepository = $adminPaymentRepo;
    }

    /**
     * @param  Request  $request
     *
     * @throws \Exception
     *
     * @return Application|Factory|View
     */
    public function index(Request $request)
    {
        $invoice = Invoice::whereNotIn('status', [Invoice::PAID, Invoice::DRAFT])
            ->orderBy('created_at', 'desc')
            ->pluck('invoice_id', 'id')->toArray();

        return view('payments.index', compact('invoice'));
    }

    /**
     * @param  CreateAdminPaymentRequest  $request
     *
     * @return mixed
     */
    public function store(CreateAdminPaymentRequest $request){
        $input = $request->all();

        try {
            $payment = $this->adminPaymentRepository->store($input);
        } catch (\Exception $exception) {
            return $this->sendError($exception->getMessage());
        }

        return $this->sendResponse($payment, 'Payment saved successfully.');
    }

    /**
     * @param  AdminPayment  $payment
     *
     * @return JsonResponse
     */
    public function edit(AdminPayment $payment)
    {
        $invoiceId = $payment->invoice->id;
        $payment['invoice'] = $payment->invoice->invoice_id;
        $payment['DueAmount'] = $this->getInvoiceDueAmount($invoiceId);

        return $this->sendResponse($payment, 'payment retrieved successfully.');
    }

    /**
     * @param  CreateAdminPaymentRequest  $request
     *
     * @return JsonResponse
     */
    public function update(CreateAdminPaymentRequest $request)
    {
        $input = $request->all();
        $this->adminPaymentRepository->updatePayment($input);

        return $this->sendSuccess('Payment updated successfully.');
    }

    /**
     * @param  AdminPayment  $payment
     *
     *
     * @return JsonResponse
     */
    public function destroy(AdminPayment $payment): JsonResponse
    {
        $this->adminPaymentRepository->adminDeletePayment($payment);

        return $this->sendSuccess('Payment deleted successfully.');
    }

    /**
     * @param $id
     *
     * @return mixed
     */
    public function getInvoiceDueAmount($id){
        $data = [];
        $invoice = Invoice::with('payments')->whereId($id)->firstOrFail();
        $data['totalDueAmount'] = $invoice->final_amount - $invoice->payments->sum('amount');
        $data['totalPaidAmount'] = $invoice->payments->sum('amount');

        return $this->sendResponse($data , "Invoice Due Amount Retrieve successfully");
    }

    /**
     *
     * @return BinaryFileResponse
     */
    public function exportAdminPaymentsExcel(): BinaryFileResponse
    {

        return Excel::download(new AdminPaymentsExport(),'Payment-Excel.xlsx');
    }
}
