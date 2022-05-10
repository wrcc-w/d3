<?php

namespace Database\Seeders;

use App\Models\AdminTestimonial;
use Illuminate\Database\Seeder;

class AdminTestimonialSeeder extends Seeder
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
                'name'        => 'Mart Iin',
                'description' => 'Infy Invoice has helped me structure my business by organizing the client details and monitoring late payments. Their mobile app is super simple and easy to use. ',
                'position'    => 'CEO, SkyBlue Photo Company',
            ],
            [
                'name'        => 'Prasad Diwan',
                'description' => 'I\'ve been using Infy Invoice for two of my small businesses for the last few years. It is the most customizable and user-friendly invoicing software I know of, with exceptional customer support.',
                'position'    => 'Director, HKHOMES.NET',
            ],
            [
                'name'        => 'Ceathy White',
                'description' => 'Goes without saying, first impression of the customers matters a lot for any business. Be it showing how professional or reliable you are, it all starts with the first email you send.',
                'position'    => 'Director–Sales, HPOWER',
            ],
        ];

        foreach ($input as $testimonial) {
            AdminTestimonial::create($testimonial);
        }
    }
}
