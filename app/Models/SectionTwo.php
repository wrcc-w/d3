<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;

class SectionTwo extends Model implements HasMedia
{
    use HasFactory, InteractsWithMedia;


    /**
     * Validation rules
     * @var array
     */
    public static $rules = [
        'text_main'                 => 'required|string|max:35',
        'text_secondary'            => 'required|string|max:160',
        'card_one_text'             => 'required|string|max:35',
        'card_one_text_secondary'   => 'required|string|max:191',
        'card_two_text'             => 'required|string|max:35',
        'card_two_text_secondary'   => 'required|string|max:191',
        'card_three_text'           => 'required|string|max:35',
        'card_three_text_secondary' => 'required|string|max:191',
        'card_four_text'            => 'required|string|max:35',
        'card_four_text_secondary'  => 'required|string|max:191',
        'card_five_text'            => 'required|string|max:35',
        'card_five_text_secondary'  => 'required|string|max:191',
        'card_six_text'             => 'required|string|max:35',
        'card_six_text_secondary'   => 'required|string|max:191',
    ];
    /**
     * @var array
     */
    public $fillable = [
        'text_main',
        'text_secondary',
        'card_one_text',
        'card_one_text_secondary',
        'card_two_text',
        'card_two_text_secondary',
        'card_three_text',
        'card_three_text_secondary',
        'card_four_text',
        'card_four_text_secondary',
        'card_five_text',
        'card_five_text_secondary',
        'card_six_text',
        'card_six_text_secondary',
    ];
}
