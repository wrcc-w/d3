<?php

namespace App\Exports;

use App\Models\AdminPayment;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\Auth;
use Maatwebsite\Excel\Concerns\FromView;

class AdminPaymentsExport implements FromView
{

    public function view(): View
    {
        $adminPayments = AdminPayment::where('tenant_id',
            Auth::user()->tenant_id)->with(['invoice.client.user'])->get();
   
        return view('excel.admin_payments_excel',compact('adminPayments'));
    }
}
