<?php

use App\Models\InvoiceItem;
use App\Models\InvoiceItemTax;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class RemoveTaxFieldFromInvoiceItemsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        /** @var InvoiceItem $invoiceItems */
        $invoiceItems = InvoiceItem::where('tax_id', '!=', null)->get();
        foreach ($invoiceItems as $invoiceItem) {
            InvoiceItemTax::create([
                'invoice_item_id' => $invoiceItem->id,
                'tax_id'          => $invoiceItem->tax_id,
                'tax'             => $invoiceItem->tax,
            ]);
        }

        Schema::table('invoice_items', function (Blueprint $table) {
            $table->dropColumn('tax_id');
            $table->dropColumn('tax');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('invoice_items', function (Blueprint $table) {
            $table->float('tax')->nullable()->after('quantity');
            $table->integer('tax_id')->nullable()->after('tax');
        });
    }
}
