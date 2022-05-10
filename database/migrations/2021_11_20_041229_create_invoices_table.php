<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInvoicesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('invoices', function (Blueprint $table) {
            $table->id();
            $table->string('invoice_id');
            $table->unsignedBigInteger('client_id');
            $table->foreign('client_id')->references('id')
                ->on('clients')
                ->onUpdate('cascade')
                ->onDelete('cascade');
            $table->date('invoice_date');
            $table->date('due_date');
            $table->float('amount')->nullable();
            $table->float('final_amount')->nullable();
            $table->integer('discount_type')->default(0);
            $table->float('discount')->default(0);
            $table->text('note')->nullable();
            $table->text('term')->nullable();
            $table->integer('recurring')->default(0);
            $table->integer('status');
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
        Schema::dropIfExists('invoices');
    }
}
