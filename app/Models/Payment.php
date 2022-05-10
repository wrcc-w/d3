<?php

namespace App\Models;

use App\Traits\Multitenantable;
use Barryvdh\LaravelIdeHelper\Eloquent;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Carbon;
use Stancl\Tenancy\Database\Concerns\BelongsToTenant;

/**
 * App\Models\Payment
 *
 * @property int $id
 * @property int $invoice_id
 * @property string $payment_mode
 * @property float $amount
 * @property string $payment_date
 * @property int|null $transaction_id
 * @property string|null $meta
 * @property string|null $notes
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|Payment newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Payment newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Payment query()
 * @method static \Illuminate\Database\Eloquent\Builder|Payment whereAmount($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Payment whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Payment whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Payment whereInvoiceId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Payment whereMeta($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Payment whereNotes($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Payment wherePaymentDate($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Payment wherePaymentMode($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Payment whereTransactionId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Payment whereUpdatedAt($value)
 * @mixin Eloquent
 * @property int $user_id
 * @property string|null $tenant_id
 * @property-read string $payment_type
 * @property-read string $payments_mode
 * @property-read \App\Models\Invoice $invoice
 * @property-read \App\Models\MultiTenant|null $tenant
 * @method static \Illuminate\Database\Eloquent\Builder|Payment whereTenantId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Payment whereUserId($value)
 */
class Payment extends Model
{
    use HasFactory, BelongsToTenant, Multitenantable;

    protected $table = 'payments';
    protected $fillable = [
        'invoice_id', 'amount', 'payment_date', 'payment_mode', 'transaction_id', 'notes', 'user_id', 'tenant_id',
    ];
    public $appends = ['payments_mode'];

    const FULLPAYMENT = 2;
    const PARTIALLYPAYMENT = 3;
    const PAYMENT_TYPE = [
        self::FULLPAYMENT      => 'Full Payment',
        self::PARTIALLYPAYMENT => 'Partially Payment',
    ];

    const STATUS = [
        'RECEIVED_AMOUNT' => 'Received Amount',
        'PAID_AMOUNT'     => 'Paid Amount',
        'DUE_AMOUNT'      => 'Due Amount',
    ];

    const MANUAL = 1;
    const STRIPE = 2;
    const PAYPAL = 3;
    const CASH = 4;
    const RAZORPAY = 5;
    const PAYMENT_MODE = [
        self::MANUAL   => 'Manual',
        self::STRIPE   => 'Stripe',
        self::PAYPAL   => 'Paypal',
        self::CASH     => 'Cash',
        self::RAZORPAY => 'Razorpay',
    ];
    public static $rules = [
        'payment_type' => 'required',
        'amount'       => 'required',
        'payment_mode' => 'required',
    ];

    /**
     *
     * @return string
     */
    public function getPaymentTypeAttribute(): string
    {
        return self::PAYMENT_MODE[$this->payment_mode];
    }

    /**
     *
     * @return string
     */
    public function getPaymentsModeAttribute(): string
    {
        return self::PAYMENT_MODE[$this->payment_mode];
    }

    public function invoice()
    {
        return $this->belongsTo(Invoice::class);
    }

}
