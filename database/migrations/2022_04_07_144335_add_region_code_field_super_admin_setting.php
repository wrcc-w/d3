<?php

use App\Models\SuperAdminSetting;
use Illuminate\Database\Migrations\Migration;

class AddRegionCodeFieldSuperAdminSetting extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        SuperAdminSetting::create([
            'key'   => 'region_code',
            'value' => '91',
        ]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
