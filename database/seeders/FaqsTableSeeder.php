<?php

namespace Database\Seeders;

use App\Models\Faq;
use Illuminate\Database\Seeder;

class FaqsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $input = [
            [
                'question' => 'Can I pull multiple expenses to an invoice?',
                'answer'   => 'Yes, you can. When you create an invoice, Infy Invoice will prompt all the unbilled expenses associated to the contact (as shown in the image below).',
            ],
            [
                'question' => 'How can I convert an estimate into an invoice?',
                'answer'   => 'To convert an estimate to an invoice, follow the below steps. Click on the Estimates tab on the left pane. Select the the estimate you want to convert to invoice. Click on Convert to invoice.',
            ],
            [
                'question' => 'How do I mark a draft as a sent invoice?',
                'answer'   => 'Once you send a drafted invoice through Infy Invoice, its status is automatically changes to ‘Sent’. Alternatively, you can manually change its delivery status by following these steps.',
            ],
            [
                'question' => 'Can I add a new category if needed?',
                'answer'   => 'Yes, you can. To add a new category, follow the steps mentioned below: Click on the Expenses module on the left sidebar. Click on the +New button.',
            ]
        ];

        foreach ($input as $faqs) {
            Faq::create($faqs);
        }
    }
}
