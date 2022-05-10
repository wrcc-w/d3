<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ChangeInvoiceFinalAmountFloatSize extends Migration 
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('invoices', function (Blueprint $table) {
            $table->float('amount',15, 2)->nullable()->change();
            $table->float('final_amount',15, 2)->nullable()->change();
        });
        Schema::table('invoice_items', function (Blueprint $table) {
            $table->float('price',15, 2)->nullable()->change();
            $table->float('total',15, 2)->nullable()->change();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('invoices', function (Blueprint $table) {
            $table->float('amount')->nullable()->change();
            $table->float('final_amount')->nullable()->change();
        });
        Schema::table('invoice_items', function (Blueprint $table) {
            $table->float('price')->nullable()->change();
            $table->float('total')->nullable()->change();
        });
    }
}
