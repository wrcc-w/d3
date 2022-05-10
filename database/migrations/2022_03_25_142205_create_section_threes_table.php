<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSectionThreesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('section_threes', function (Blueprint $table) {
            $table->id();
            $table->string('text_main', 30);
            $table->string('text_secondary', 160);
            $table->string('img_url');
            $table->string('text_one', 50);
            $table->string('text_two', 50);
            $table->string('text_three', 50);
            $table->text('text_one_secondary');
            $table->text('text_two_secondary');
            $table->text('text_three_secondary');
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
        Schema::dropIfExists('section_threes');
    }
}
