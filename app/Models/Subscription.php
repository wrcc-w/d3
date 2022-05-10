<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Support\Carbon;

/**
 * App\Models\Subscription
 *
 * @property int $id
 * @property int $user_id
 * @property int|null $subscription_plan_id
 * @property int|null $transaction_id
 * @property float|null $plan_amount
 * @property int $plan_frequency 1 = Month, 2 = Year
 * @property string $start_date
 * @property string $end_date
 * @property Carbon|null $trial_ends_at
 * @property bool $status
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @property-read \App\Models\SubscriptionPlan|null $subscriptionPlan
 * @property-read \App\Models\Transaction|null $transactions
 * @property-read \App\Models\User $user
 * @method static Builder|Subscription newModelQuery()
 * @method static Builder|Subscription newQuery()
 * @method static Builder|Subscription query()
 * @method static Builder|Subscription whereCreatedAt($value)
 * @method static Builder|Subscription whereEndDate($value)
 * @method static Builder|Subscription whereId($value)
 * @method static Builder|Subscription wherePlanAmount($value)
 * @method static Builder|Subscription wherePlanFrequency($value)
 * @method static Builder|Subscription whereStartDate($value)
 * @method static Builder|Subscription whereStatus($value)
 * @method static Builder|Subscription whereSubscriptionPlanId($value)
 * @method static Builder|Subscription whereTransactionId($value)
 * @method static Builder|Subscription whereTrialEndsAt($value)
 * @method static Builder|Subscription whereUpdatedAt($value)
 * @method static Builder|Subscription whereUserId($value)
 * @mixin \Eloquent
 */
class Subscription extends Model
{
    use HasFactory;

    const ACTIVE = 1;
    const INACTIVE = 0;

    const TYPE_FREE = 0;
    const TYPE_STRIPE = 1;
    const TYPE_PAYPAL = 2;
    const TYPE_RAZORPAY = 3;

    const PAYMENT_TYPES = [
        self::TYPE_FREE     => 'Free Plan',
        self::TYPE_STRIPE   => 'Stripe',
        self::TYPE_PAYPAL   => 'PayPal',
        self::TYPE_RAZORPAY => 'Razorpay',
    ];

    const STATUS_ARR = [
        self::ACTIVE   => 'Active',
        self::INACTIVE => 'Deactive',
    ];
    const MONTH = 'Month';
    const YEAR = 'Year';


    public $fillable = [
        'user_id', 'subscription_plan_id', 'transaction_id', 'plan_amount', 'plan_frequency', 'start_date', 'end_date',
        'trial_ends_at', 'status',
    ];

    /**
     * @var string
     */
    protected $table = 'subscriptions';

    /**
     * @var string[]
     */
    protected $casts = [
        'user_id'              => 'integer',
        'subscription_plan_id' => 'integer',
        'transaction_id'       => 'integer',
        'starts_at'            => 'datetime',
        'ends_at'              => 'datetime',
        'trial_ends_at'        => 'datetime',
        'status'               => 'boolean',
    ];

    protected $with = ['subscriptionPlan'];

    /**
     * @return BelongsTo
     */
    public function subscriptionPlan(): BelongsTo
    {
        return $this->belongsTo(SubscriptionPlan::class, 'subscription_plan_id', 'id');
    }

    /**
     * @return BelongsTo
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    /**
     * @return HasOne
     */
    public function transactions(): HasOne
    {
        return $this->hasOne(Transaction::class, 'id', 'transaction_id');
    }

    public function isExpired(): bool
    {
        $now = Carbon::now();

        // this means the subscription is ended.
        return (! empty($this->trial_ends_at) && $this->trial_ends_at < $now) || $this->end_date < $now;
    }
}
