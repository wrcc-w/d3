<?php

namespace App\Http\Controllers;

use App\Exports\AdminInvoicesExport;
use App\Http\Requests\CreateInvoiceRequest;
use App\Http\Requests\UpdateInvoiceRequest;
use App\Mail\InvoicePaymentReminderMail;
use App\Models\Invoice;
use App\Models\Product;
use App\Repositories\InvoiceRepository;
use Barryvdh\DomPDF\Facade as PDF;
use Carbon\Carbon;
use Exception;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use Laracasts\Flash\Flash;
use Maatwebsite\Excel\Facades\Excel;
use Symfony\Component\HttpFoundation\BinaryFileResponse;

class InvoiceController extends AppBaseController
{
    /** @var InvoiceRepository */
    public $invoiceRepository;

    public function __construct(InvoiceRepository $invoiceRepo)
    {
        $this->invoiceRepository = $invoiceRepo;
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
        $this->updateInvoiceOverDueStatus();
        $statusArr = Invoice::STATUS_ARR;
        $status = $request->status;

        return view('invoices.index', compact('statusArr', 'status'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Application|Factory|View
     */
    public function create()
    {
        $data = $this->invoiceRepository->getSyncList();
        unset($data['statusArr'][0]);

        return view('invoices.create')->with($data);
    }

    /**
     * @param CreateInvoiceRequest $request
     *
     * @return JsonResponse
     */
    public function store(CreateInvoiceRequest $request)
    {
        try {
            DB::beginTransaction();
            $bill = $this->invoiceRepository->saveInvoice($request->all());
            DB::commit();
            if ($request->status != Invoice::DRAFT) {
                $this->invoiceRepository->saveNotification($request->all());

                return $this->sendResponse($bill, 'Invoice saved & sent successfully.');
            }
        } catch (Exception $e) {
            DB::rollBack();

            return $this->sendError($e->getMessage());
        }

        return $this->sendResponse($bill, 'Invoice saved successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param Invoice $invoice
     * @return Application|Factory|View
     */
    public function show(Invoice $invoice)
    {
        $invoiceData = $this->invoiceRepository->getInvoiceData($invoice);
        
        return view('invoices.show')->with($invoiceData);
       
    }

    /**
     * @param Invoice $invoice
     *
     * @return Application|Factory|View|RedirectResponse
     */
    public function edit(Invoice $invoice)
    {
        if ($invoice->status == Invoice::PAID || $invoice->status == Invoice::Partially) {
            Flash::error("Paid invoices can not editable.");

            return redirect()->route('invoices.index');
        }
        $data = $this->invoiceRepository->prepareEditFormData($invoice);

        return view('invoices.edit')->with($data);
    }

    /**
     * @param UpdateInvoiceRequest $request
     * @param Invoice $invoice
     *
     * @return JsonResponse
     */
    public function update(UpdateInvoiceRequest $request, Invoice $invoice): JsonResponse
    {
        $input = $request->all();
        try {
            DB::beginTransaction();
            $invoice = $this->invoiceRepository->updateInvoice($invoice->id, $input);
            DB::commit();
            if ($input['invoiceStatus'] === "1") {
                return $this->sendResponse($invoice, 'Invoice updated & sent successfully.');
            }
        } catch (Exception $e) {
            DB::rollBack();

            return $this->sendError($e->getMessage());
        }

        return $this->sendResponse($invoice, 'Invoice updated successfully.');
    }

    /**
     * @param Invoice $invoice
     *
     * @return JsonResponse
     */
    public function destroy(Invoice $invoice): JsonResponse
    {
        $invoice->delete();

        return $this->sendSuccess('Invoice Deleted successfully.');
    }

    public function getProduct($productId): JsonResponse
    {
        $product = Product::pluck('unit_price', 'id')->toArray();

        return $this->sendResponse($product, 'Product Price retrieved successfully.');
    }

    /**
     * @param Invoice $invoice
     *
     * @return Response
     */
    public function convertToPdf(Invoice $invoice): Response
    {

        $invoice->load('client.user', 'invoiceTemplate', 'invoiceItems.product', 'invoiceItems.invoiceItemTax');
        $invoiceData = $this->invoiceRepository->getPdfData($invoice);
        $invoiceTemplate = $this->invoiceRepository->getDefaultTemplate($invoice);
        $pdf = PDF::loadView("invoices.invoice_template_pdf.$invoiceTemplate", $invoiceData);

        return $pdf->stream('invoice.pdf');
    }

    /**
     * @param Invoice $invoice
     * @param $status
     *
     * @return mixed
     */
    public function updateInvoiceStatus(Invoice $invoice, $status)
    {
        $this->invoiceRepository->draftStatusUpdate($invoice);

        return $this->sendSuccess('Invoice Send successfully.');
    }


    public function updateInvoiceOverDueStatus()
    {
        $invoice = Invoice::whereStatus(Invoice::UNPAID)->get();
        $currentDate = Carbon::today()->format('Y-m-d');
        foreach ($invoice as $invoices) {
            if ($invoices->due_date < $currentDate) {
                $invoices->update([
                    'status' => Invoice::OVERDUE,
                ]);
            }
        }
    }

    /**
     * @param $invoiceId
     * @return mixed
     */
    public function invoicePaymentReminder($invoiceId)
    {
        $invoice = Invoice::with(['client.user', 'payments'])->whereId($invoiceId)->firstOrFail();
        $paymentReminder = Mail::to($invoice->client->user->email)->send(new InvoicePaymentReminderMail($invoice));

        return $this->sendResponse($paymentReminder, "Payment reminder mail send successfully.");
    }

    /**
     *
     * @return BinaryFileResponse
     */
    public function exportInvoicesExcel(): BinaryFileResponse
    {
        return Excel::download(new AdminInvoicesExport(), 'invoice-excel.xlsx');
    }

    /**
     * @param $invoiceId
     *
     * @return Application|Factory|View
     */
    public function showPublicInvoice($invoiceId)
    {
        $invoice = Invoice::with('client.user')->whereInvoiceId($invoiceId)->firstOrFail();

        $invoiceData = $this->invoiceRepository->getInvoiceData($invoice);

        return \view('invoices.public_view')->with($invoiceData);
    }

    /**
     * @param $invoiceId
     *
     * @return mixed
     */
    public function getPublicInvoicePdf($invoiceId)
    {
        $invoice = Invoice::whereInvoiceId($invoiceId)->firstOrFail();
        $invoice->load('client.user', 'invoiceTemplate', 'invoiceItems.product', 'invoiceItems.invoiceItemTax');

        $invoiceData = $this->invoiceRepository->getPdfData($invoice);
        $invoiceTemplate = $this->invoiceRepository->getDefaultTemplate($invoice);
        $pdf = PDF::loadView("invoices.invoice_template_pdf.$invoiceTemplate", $invoiceData);

        return $pdf->stream('invoice.pdf');
    }
}
