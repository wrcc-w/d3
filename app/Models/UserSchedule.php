<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Carbon;

/**
 * App\Models\UserSchedule
 *
 * @property int $id
 * @property int $user_id
 * @property string|null $from_time
 * @property string|null $to_time
 * @property int|null $day_of_week
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|UserSchedule newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|UserSchedule newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|UserSchedule query()
 * @method static \Illuminate\Database\Eloquent\Builder|UserSchedule whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UserSchedule whereDayOfWeek($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UserSchedule whereFromTime($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UserSchedule whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UserSchedule whereToTime($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UserSchedule whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UserSchedule whereUserId($value)
 * @mixin \Eloquent
 */
class UserSchedule extends Model
{
    use HasFactory;

    const Mon = 1;
    const Tue = 2;
    const Wed = 3;
    const Thu = 4;
    const Fri = 5;
    const Sat = 6;
    const Sun = 7;
    const WEEKDAY_FULL_NAME = [
        self::Mon => 'Monday',
        self::Tue => 'Tuesday',
        self::Wed => 'Wednesday',
        self::Thu => 'Thursday',
        self::Fri => 'Friday',
        self::Sat => 'Saturday',
        self::Sun => 'Sunday',
    ];
    protected $table = 'user_schedules';
    protected $fillable = [
        'user_id',
        'from_time',
        'to_time',
        'day_of_week',
    ];
}
