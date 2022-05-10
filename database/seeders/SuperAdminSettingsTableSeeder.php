<?php

namespace Database\Seeders;

use App\Models\SuperAdminSetting;
use Illuminate\Database\Seeder;

class SuperAdminSettingsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $imageUrl = 'assets/images/infyom.png';
        $faviconImageUrl = 'web/media/logos/favicon.png';

        SuperAdminSetting::create([
            'key' => 'app_name', 'value' => 'InfyInvoice',
        ]);
        SuperAdminSetting::create([
            'key' => 'app_logo', 'value' => $imageUrl,
        ]);
        SuperAdminSetting::create([
            'key'   => 'favicon_icon',
            'value' => $faviconImageUrl,
        ]);

    }

}
