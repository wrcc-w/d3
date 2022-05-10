<?php

namespace Database\Seeders;

use App\Models\Setting;
use Illuminate\Database\Seeder;

class SettingTablePaymentGatewayFieldSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $userTenantId = session('tenant_id', null);
        Setting::create([
            'key'       => 'stripe_key',
            'value'     => '',
            'tenant_id' => $userTenantId != null ? $userTenantId : null,
        ]);
        Setting::create([
            'key'       => 'stripe_secret',
            'value'     => '',
            'tenant_id' => $userTenantId != null ? $userTenantId : null,
        ]);
        Setting::create([
            'key'       => 'paypal_client_id',
            'value'     => '',
            'tenant_id' => $userTenantId != null ? $userTenantId : null,
        ]);
        Setting::create([
            'key'       => 'paypal_secret',
            'value'     => '',
            'tenant_id' => $userTenantId != null ? $userTenantId : null,
        ]);
        Setting::create([
            'key'       => 'razorpay_key',
            'value'     => '',
            'tenant_id' => $userTenantId != null ? $userTenantId : null,
        ]);
        Setting::create([
            'key'       => 'razorpay_secret',
            'value'     => '',
            'tenant_id' => $userTenantId != null ? $userTenantId : null,
        ]);
        Setting::create([
            'key'       => 'stripe_enabled',
            'value'     => 0,
            'tenant_id' => $userTenantId != null ? $userTenantId : null,
        ]);
        Setting::create([
            'key'       => 'paypal_enabled',
            'value'     => 0,
            'tenant_id' => $userTenantId != null ? $userTenantId : null,
        ]);
        Setting::create([
            'key'       => 'razorpay_enabled',
            'value'     => 0,
            'tenant_id' => $userTenantId != null ? $userTenantId : null,
        ]);
    }
}
