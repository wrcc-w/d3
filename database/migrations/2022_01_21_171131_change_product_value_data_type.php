<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ChangeProductValueDataType extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('products', function (Blueprint $table) {
            $table->float('unit_price')->change();
        });
        Schema::table('taxes', function (Blueprint $table) {
            $table->float('value')->change();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('products', function (Blueprint $table) {
            $table->string('unit_price')->change();
        });
        Schema::table('taxes', function (Blueprint $table) {
            $table->string('value')->change();
        });
    }
}
