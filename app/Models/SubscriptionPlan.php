<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

/**
 * App\Models\SubscriptionPlan
 *
 * @property int $id
 * @property string|null $currency
 * @property string $name
 * @property float|null $price
 * @property int $frequency 1 = Month, 2 = Year
 * @property int $is_default
 * @property int $trial_days Default validity will be 7 trial days
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Subscription[] $hasZeroPlan
 * @property-read int|null $has_zero_plan_count
 * @property-read \App\Models\Subscription|null $plan
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Subscription[] $plans
 * @property-read int|null $plans_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Subscription[] $subscription
 * @property-read int|null $subscription_count
 * @method static Builder|SubscriptionPlan newModelQuery()
 * @method static Builder|SubscriptionPlan newQuery()
 * @method static Builder|SubscriptionPlan query()
 * @method static Builder|SubscriptionPlan whereCreatedAt($value)
 * @method static Builder|SubscriptionPlan whereCurrency($value)
 * @method static Builder|SubscriptionPlan whereFrequency($value)
 * @method static Builder|SubscriptionPlan whereId($value)
 * @method static Builder|SubscriptionPlan whereIsDefault($value)
 * @method static Builder|SubscriptionPlan whereName($value)
 * @method static Builder|SubscriptionPlan wherePrice($value)
 * @method static Builder|SubscriptionPlan whereTrialDays($value)
 * @method static Builder|SubscriptionPlan whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class SubscriptionPlan extends Model
{
    use HasFactory;

    const TRAIL_DAYS = 7;
    const MONTH = 1;
    const YEAR = 2;

    public const PLAN_TYPE = [
        1 => 'Month',
        2 => 'Year',
    ];
    public const PLAN_TYPE_SORT_NAME = [
        1 => 'mo',
        2 => 'yr',
    ];

    const FREQUENCY = [
        self::MONTH => 1,
        self::YEAR  => 1,
    ];

    /**
     * @var string[]
     */
    public static $rules = [
        'name'  => 'required|max:50|unique:subscription_plans,name',
        'price' => 'required|max:4|gte:0',
    ];
    /**
     * @var string[]
     */
    public static $editRules = [
        'name'  => 'required|max:50|unique:subscription_plans,name',
        'price' => 'required|max:4|gte:0',
    ];
    /**
     * @var string
     */
    protected $table = 'subscription_plans';
    /**
     * @var string[]
     */
    protected $fillable = [
        'name',
        'currency',
        'price',
        'frequency',
        'is_default',
        'trial_days',
    ];

//    protected $with = ['subscription','features','planFeatures','hasZeroPlan'];

    /**
     * @return HasOne
     */
    public function plan(): HasOne
    {
        return $this->hasOne(Subscription::class)->latest();
    }

    /**
     * @return HasMany
     */
    public function plans(): HasMany
    {
        if (isAuth()) {
            return $this->hasMany(Subscription::class)->where('user_id', getLogInUserId());
        }

        return $this->hasMany(Subscription::class);

    }

    /**
     * @return HasMany
     */
    public function subscription(): HasMany
    {
        return $this->hasMany(Subscription::class)->where('status', '=', Subscription::ACTIVE);
    }

    /**
     * @return HasMany
     */
    public function hasZeroPlan()
    {
        if (isAuth()) {
            return $this->hasMany(Subscription::class)->where('plan_amount', 0)->where('user_id', getLogInUserId());
        }

        return $this->hasMany(Subscription::class)->where('plan_amount', 0);
    }


}
