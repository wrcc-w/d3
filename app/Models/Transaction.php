<?php

namespace App\Models;

use App\Traits\Multitenantable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Stancl\Tenancy\Database\Concerns\BelongsToTenant;

/**
 * @method static create(array $transactionData)
 */
class Transaction extends Model
{
    use HasFactory, BelongsToTenant, Multitenantable;

    protected $table = 'transactions';
    public $fillable = ['transaction_id', 'amount', 'status', 'meta', 'tenant_id', 'user_id', 'payment_mode'];


    protected $casts = [
        'meta'   => 'json',
        'status' => 'boolean',
    ];

    const PAID = 'Paid';
    const UNPAID = 'Unpaid';

    const TYPE_STRIPE = 1;
    const TYPE_PAYPAL = 2;
    const TYPE_RAZORPAY = 3;

    const PAYMENT_TYPES = [
        self::TYPE_STRIPE   => 'Stripe',
        self::TYPE_PAYPAL   => 'PayPal',
        self::TYPE_RAZORPAY => 'RazorPay',
    ];

    /**
     * @return BelongsTo
     */
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    /**
     * @return BelongsTo
     */
    public function subscription()
    {
        return $this->belongsTo(Subscription::class, 'transaction_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function transactionSubscription()
    {
        return $this->hasOne(Subscription::class, 'transaction_id', 'id');
    }
}
