<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class NotesSizeIncreaseInAllModules extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('clients', function (Blueprint $table) {
            $table->mediumText('note')->nullable()->change();
        });
        Schema::table('invoices', function (Blueprint $table) {
            $table->mediumText('note')->nullable()->change();
            $table->mediumText('term')->nullable()->change();
        });
        Schema::table('payments', function (Blueprint $table) {
            $table->mediumText('notes')->nullable()->change();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('clients', function (Blueprint $table) {
            $table->dropColumn('note');
        });
        Schema::table('invoices', function (Blueprint $table) {
            $table->dropColumn('note');
            $table->dropColumn('term');
        });
        Schema::table('payments', function (Blueprint $table) {
            $table->dropColumn('notes');
        });
    }
}
