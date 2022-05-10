<?php

namespace App\Exports;

use App\Models\Payment;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\Auth;
use Maatwebsite\Excel\Concerns\FromView;

class ClientTransactionsExport implements FromView
{
    /**
     *
     * @return View
     */
    public function view(): View
    {
        $query = Payment::with('invoice.client.user')->select('payments.*')
            ->where('user_id', Auth::id());
        $transactions = $query->get();

        return view('excel.client_transactions_excel', compact('transactions'));
    }
}
