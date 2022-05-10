<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;


/**
 * App\Models\InvoiceItem
 *
 * @property int $id
 * @property int $invoice_id
 * @property int|null $product_id
 * @property string|null $product_name
 * @property int $quantity
 * @property float $price
 * @property float $total
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\InvoiceItemTax[] $invoiceItemTax
 * @property-read int|null $invoice_item_tax_count
 * @property-read \App\Models\Product|null $product
 * @method static Builder|InvoiceItem newModelQuery()
 * @method static Builder|InvoiceItem newQuery()
 * @method static Builder|InvoiceItem query()
 * @method static Builder|InvoiceItem whereCreatedAt($value)
 * @method static Builder|InvoiceItem whereId($value)
 * @method static Builder|InvoiceItem whereInvoiceId($value)
 * @method static Builder|InvoiceItem wherePrice($value)
 * @method static Builder|InvoiceItem whereProductId($value)
 * @method static Builder|InvoiceItem whereProductName($value)
 * @method static Builder|InvoiceItem whereQuantity($value)
 * @method static Builder|InvoiceItem whereTotal($value)
 * @method static Builder|InvoiceItem whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class InvoiceItem extends Model
{
    use HasFactory;

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'product_id' => 'required',
        'quantity'   => 'required|integer',
        'price'      => 'required|regex:/^\d+(\.\d{1,2})?$/',
    ];

    protected  $table = 'invoice_items';

    public $fillable = [
        'invoice_id',
        'product_id',
        'product_name',
        'quantity',
        'price',
        'total',
    ];


    /**
     * @return BelongsTo
     */
    public function product(): BelongsTo
    {
        return $this->belongsTo(Product::class, 'product_id', 'id');
    }

    /**
     * @return HasMany
     */
    public function invoiceItemTax(): HasMany
    {
        return $this->hasMany(InvoiceItemTax::class);
    }

}
