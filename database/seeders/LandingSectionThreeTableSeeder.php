<?php

namespace Database\Seeders;

use App\Models\SectionThree;
use Illuminate\Database\Seeder;

class LandingSectionThreeTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $input = [
            'text_main'            => 'APP FEATURES',
            'text_secondary'       => 'Professional invoices',
            'img_url'              => ('/landing-theme/images/feature-section-3-img.png'),
            'text_one'             => 'Create multilingual and multicurrency invoices',
            'text_two'             => 'Print and share invoice with ease',
            'text_three'           => 'Get real-time invoice reports',
            'text_one_secondary'   => 'Send invoices to your customers in their currency, make base currency adjustments, and easily analyze the revalued balances.',
            'text_two_secondary'   => 'Sharing invoices is effortless using Infy Invoice—create clones, print out a copy, or simply email them.',
            'text_three_secondary' => 'Run real-time reports on your sales, expenses and tax summary.',
        ];

        SectionThree::create($input);
    }
}
