<?php

namespace App\Models;

use App\Traits\Multitenantable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;
use Spatie\MediaLibrary\MediaCollections\Models\Media;
use Stancl\Tenancy\Database\Concerns\BelongsToTenant;

/**
 * App\Models\Product
 *
 * @property int $id
 * @property string $name
 * @property string $code
 * @property int $category_id
 * @property string $unit_price
 * @property string|null $description
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\Category|null $category
 * @property-read string $product_image
 * @property-read \Spatie\MediaLibrary\MediaCollections\Models\Collections\MediaCollection|Media[] $media
 * @property-read int|null $media_count
 * @property-read \Illuminate\Notifications\DatabaseNotificationCollection|\Illuminate\Notifications\DatabaseNotification[]
 *     $notifications
 * @property-read int|null $notifications_count
 * @method static \Illuminate\Database\Eloquent\Builder|Product newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Product newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Product query()
 * @method static \Illuminate\Database\Eloquent\Builder|Product whereCategoryId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Product whereCode($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Product whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Product whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Product whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Product whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Product whereUnitPrice($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Product whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class Product extends Model implements HasMedia
{
    use HasFactory, Notifiable, InteractsWithMedia, BelongsToTenant, Multitenantable;

    protected $table = 'products';
    protected $fillable = ['name', 'code', 'category_id', 'unit_price', 'description', 'tenant_id'];

    const Image = 'product';
    protected $appends = ['product_image'];

    public static $rules = [
        'name'        => 'required|max:191',
        'code'        => 'required|alpha_num|min:3|max:6|unique:products,code',
        'category_id' => 'required',
        'unit_price'  => 'required|numeric',
    ];

    public static $messages = [
        'code.required'  => 'The product code field is required.',
        'code.size'      => 'The product code must be 6 characters.',
        'code.is_unique' => 'The product code has already been taken.',
    ];

    /**
     *
     * @return string
     */
    public function getProductImageAttribute(): string
    {
        /** @var Media $media */
        $media = $this->getMedia(self::Image)->first();
        if (! empty($media)) {
            return $media->getFullUrl();
        }

        return asset('assets/images/default-product.jpg');
    }

    public function category(){
        return $this->hasOne(Category::class,'id','category_id');
    }
}
