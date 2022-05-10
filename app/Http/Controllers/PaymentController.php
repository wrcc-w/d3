<?php

namespace App\Http\Controllers;

use App\Exports\AdminTransactionsExport;
use App\Models\Payment;
use Exception;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;
use Symfony\Component\HttpFoundation\BinaryFileResponse;

class PaymentController extends AppBaseController
{
    /**
     * @param  Request  $request
     *
     * @throws Exception
     *
     * @return Application|Factory|View
     */
    public function index(Request $request)
    {
        getSuperAdmin();
        $paymentModeArr = Payment::PAYMENT_MODE;

        return view('transactions.index', compact('paymentModeArr'));
    }

    /**
     * @return BinaryFileResponse
     */
    public function exportTransactionsExcel (): BinaryFileResponse
    {
        return Excel::download(new AdminTransactionsExport(),'transaction.xlsx');
    }
}
