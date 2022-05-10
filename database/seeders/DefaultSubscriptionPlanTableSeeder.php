<?php

namespace Database\Seeders;

use App\Models\SubscriptionPlan;
use Illuminate\Database\Seeder;

class DefaultSubscriptionPlanTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $input = [
            'name'       => 'Standard',
            'currency'   => 'usd',
            'price'      => 10,
            'frequency'  => SubscriptionPlan::MONTH,
            'is_default' => 1,
            'trial_days' => 7,
        ];

        $subscriptionPlan = SubscriptionPlan::create($input);
    }
}
