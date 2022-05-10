<?php

namespace Database\Seeders;

use App\Models\Setting;
use Illuminate\Database\Seeder;

class InvoiceSettingTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $userTenantId = session('tenant_id', null);
        Setting::create(['key'       => 'default_invoice_template', 'value' => 'defaultTemplate',
                         'tenant_id' => $userTenantId != null ? $userTenantId : null,
        ]);
        Setting::create(['key'       => 'default_invoice_color', 'value' => '#040404',
                         'tenant_id' => $userTenantId != null ? $userTenantId : null,
        ]);
    }
}
