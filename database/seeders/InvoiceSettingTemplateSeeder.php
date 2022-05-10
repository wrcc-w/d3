<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class InvoiceSettingTemplateSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $userTenantId = session('tenant_id', null);
        $input = \App\Models\Setting::INVOICE__TEMPLATE_ARRAY;
        foreach ($input as $key => $value) {
            DB::table('invoice-settings')->insert([
                'key'            => $key,
                'template_name'  => $value,
                'template_color' => '#000000',
                'tenant_id'      => $userTenantId ?? null,
            ]);
        }
    }
}
