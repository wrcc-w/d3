<?php

use App\Models\Invoice;
use App\Models\InvoiceSetting;
use Illuminate\Database\Migrations\Migration;

/**
 * Class ChangeInvoiceTemplateIdDefaultValue
 */
class ChangeInvoiceTemplateIdDefaultValue extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        $invoiceTemplate = InvoiceSetting::first();

        /** @var InvoiceSetting $invoices */
        $invoices = Invoice::whereTemplateId(null)->get();

        foreach ($invoices as $invoice) {
            $invoice->update([
                'template_id' => $invoiceTemplate->id,
            ]);
        }
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {

    }
}
