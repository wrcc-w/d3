<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

/**
 * App\Models\InvoiceItemTax
 *
 * @property int $id
 * @property int $invoice_item_id
 * @property int $tax_id
 * @property float|null $tax
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\InvoiceItem $invoiceItem
 * @method static Builder|InvoiceItemTax newModelQuery()
 * @method static Builder|InvoiceItemTax newQuery()
 * @method static Builder|InvoiceItemTax query()
 * @method static Builder|InvoiceItemTax whereCreatedAt($value)
 * @method static Builder|InvoiceItemTax whereId($value)
 * @method static Builder|InvoiceItemTax whereInvoiceItemId($value)
 * @method static Builder|InvoiceItemTax whereTax($value)
 * @method static Builder|InvoiceItemTax whereTaxId($value)
 * @method static Builder|InvoiceItemTax whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class InvoiceItemTax extends Model
{
    use HasFactory;

    public static $rules = [
        'invoice_item_id' => 'required',
        'tax_id'          => 'required',
        'tax'             => 'nullable',
    ];

    protected $table = 'invoice_item_taxes';

    public $fillable = [
        'invoice_item_id',
        'tax_id',
        'tax',
    ];

    public function invoiceItem(): BelongsTo
    {
        return $this->belongsTo(InvoiceItem::class);
    }
}
