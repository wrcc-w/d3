<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;
use Spatie\MediaLibrary\MediaCollections\Models\Media;

class SuperAdminSetting extends Model implements HasMedia
{
    use HasFactory, InteractsWithMedia;

    public $table = 'super_admin_settings';

    public const PATH = 'super_admin_settings';
    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'app_name'                 => 'required|max:30',
        'app_logo'                 => 'nullable|mimes:jpg,jpeg,png',
        'favicon'                  => 'nullable|mimes:jpg,jpeg,png,ico',
        'plan_expire_notification' => 'required|max:2',
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $footerRules = [
        'footer_text' => 'required|max:270',
        'email'       => 'required|email:filter',
        'phone'       => 'required',
        'address'     => 'required',
    ];

    public $fillable = [
        'key',
        'value',
    ];
    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id'    => 'integer',
        'key'   => 'string',
        'value' => 'string',
    ];

    /**
     * @return mixed
     */
    public function getLogoUrlAttribute()
    {
        /** @var Media $media */
        $media = $this->media->first();
        if (!empty($media)) {
            return $media->getFullUrl();
        }

        return $this->value;
    }
}
