<?php

namespace Database\Seeders;

use App\Models\Setting;
use Illuminate\Database\Seeder;

class SettingFavIconFieldSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        /** @var Setting $companyLogo */
        $companyLogo = Setting::where('key', 'company_logo')->firstOrFail();
        $companyLogo->delete();

        $userTenantId = session('tenant_id', null);
        $imageUrl = 'web/media/logos/favicon.png';
        Setting::create([
            'key'       => 'favicon_icon',
            'value'     => $imageUrl,
            'tenant_id' => $userTenantId != null ? $userTenantId : null,
        ]);
    }
}
