<?php

namespace Database\Seeders;

use App\Models\Currency;
use Illuminate\Database\Seeder;

class DefaultCurrencySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $currencies = file_get_contents(storage_path('currencies/defaultCurrency.json'));
        $currencies = json_decode($currencies, true)['currencies'];

        Currency::insert($currencies);
    }
}
