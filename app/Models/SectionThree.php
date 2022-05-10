<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;
use Spatie\MediaLibrary\MediaCollections\Models\Media;

class SectionThree extends Model implements HasMedia
{
    use HasFactory, InteractsWithMedia;

    public const SECTION_THREE_PATH = 'section_three';

    /**
     * Validation rules
     * @var array
     */
    public static $rules = [
        'text_main'            => 'required|string|max:30',
        'text_secondary'       => 'required|string|max:160',
        'img_url'              => 'mimes:jpeg,jpg,png',
        'text_one'             => 'required|string|max:50',
        'text_two'             => 'required|string|max:50',
        'text_three'           => 'nullable|string|max:50',
        'text_one_secondary'   => 'nullable|string|max:150',
        'text_two_secondary'   => 'nullable|string|max:150',
        'text_three_secondary' => 'nullable|string|max:150',
    ];
    /**
     * @var array
     */
    public $fillable = [
        'text_main',
        'text_secondary',
        'img_url',
        'text_one',
        'text_two',
        'text_three',
        'text_one_secondary',
        'text_two_secondary',
        'text_three_secondary',
    ];

    /**
     * @return string
     */
    public function getImgUrlAttribute()
    {
        /** @var Media $media */
        $media = $this->getMedia(self::SECTION_THREE_PATH)->first();
        if (!empty($media)) {
            return $media->getFullUrl();
        }

        return asset('landing-theme/images/feature-section-3-img.png');
    }
}
