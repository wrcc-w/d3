<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;
use Spatie\MediaLibrary\MediaCollections\Models\Media;

class ServiceSlider extends Model implements HasMedia
{
    use HasFactory, InteractsWithMedia;

    public const SERVICE_SLIDER = 'service_slider';


    /**
     * Validation rules
     * @var array
     */
    public static $rules = [
        'image' => 'mimes:jpeg,jpg,png,svg',
    ];
    /**
     * @var array
     */
    public $fillable = [
        'image',
    ];

    protected $appends = ['image_url'];

    /**
     * @return mixed
     */
    public function getImageUrlAttribute()
    {
        /** @var Media $media */
        $media = $this->getMedia(self::SERVICE_SLIDER)->first();
        if (!empty($media)) {
            return $media->getFullUrl();
        }

        return asset('web_front/images/main-banner/banner-one/woman-doctor.png');
    }
}
