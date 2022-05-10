<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInvoiceItemTaxesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('invoice_item_taxes', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('invoice_item_id');
            $table->foreign('invoice_item_id')->references('id')
                ->on('invoice_items')
                ->onUpdate('cascade')
                ->onDelete('cascade');
            $table->unsignedBigInteger('tax_id');
            $table->float('tax')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('invoice_item_taxes');
    }
}
