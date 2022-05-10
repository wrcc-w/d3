<?php

namespace Database\Seeders;

use App\Models\SectionTwo;
use Illuminate\Database\Seeder;

class LandingSectionTwoTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $input = [
            'text_main'                 => 'Invoice, the smart way',
            'text_secondary'            => 'Create professional invoices',
            'card_one_text'             => 'Faster online invoice payments',
            'card_one_text_secondary'   => 'Set up your preferred payment gateway, and start accepting card payments to instantly increase your cash flow.',
            'card_two_text'             => '
Send friendly payment reminders',
            'card_two_text_secondary'   => 'Automate payment reminders and get paid on time. You can also send personalized thank you notes when you receive payments.',
            'card_three_text'           => 'Manage credits, refund payments',
            'card_three_text_secondary' => 'Need to issue a refund or make adjustments for an overpaid invoice? No problem! Just create a credit note and apply.',
            'card_four_text'            => 'Run online payment reports',
            'card_four_text_secondary'  => 'Instantly find out which customer is slow to pay and which invoices have already been paid. Also run detailed reports.',
            'card_five_text'            => '
Send professional estimates',
            'card_five_text_secondary'  => 'Choose your favorite theme from our template gallery, and make it your own before you send it to a client.',
            'card_six_text'             => 'Invoice Template',
            'card_six_text_secondary'   => 'We are supporting the beautiful invoice template, which is used when you print the invoice template. You can manage the downloaded invoice format by using this interface.',
        ];

        SectionTwo::create($input);
    }
}
