<?php

namespace App\Exports;

use App\Models\Payment;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;

class AdminTransactionsExport implements FromView
{
    /**
     *
     * @return View
     */
    public function view(): View
    {
        $payments = Payment::with(['invoice.client.user'])->get();

        return view('excel.admin_transactions_excel', compact('payments'));
    }
}
