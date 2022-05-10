<?php

namespace App\Exports;

use App\Models\Invoice;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;

class AdminInvoicesExport implements FromView
{
    /**
     * @return View
     */
    public function view(): View
    {
        $invoices = Invoice::with('client.user', 'payments')->get();

        return view('excel.admin_invoices_excel', compact('invoices'));
    }
    
}
