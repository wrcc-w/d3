<?php

namespace App\Models;

use Database\Factories\RoleFactory;
use Eloquent as Model;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Support\Carbon;
use Spatie\Permission\Models\Role as roleModal;

/**
 * Class Role
 *
 * @package App\Models
 * @version August 5, 2021, 10:43 am UTC
 * @property string $name
 * @property int $id
 * @property string $display_name
 * @property int $is_default
 * @property string $guard_name
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @property-read Collection|\Spatie\Permission\Models\Permission[] $permissions
 * @property-read int|null $permissions_count
 * @property-read Collection|User[] $users
 * @property-read int|null $users_count
 * @method static RoleFactory factory(...$parameters)
 * @method static Builder|Role newModelQuery()
 * @method static Builder|Role newQuery()
 * @method static Builder|Role permission($permissions)
 * @method static Builder|Role query()
 * @method static Builder|Role whereCreatedAt($value)
 * @method static Builder|Role whereDisplayName($value)
 * @method static Builder|Role whereGuardName($value)
 * @method static Builder|Role whereId($value)
 * @method static Builder|Role whereIsDefault($value)
 * @method static Builder|Role whereName($value)
 * @method static Builder|Role whereUpdatedAt($value)
 * @mixin Model
 */
class Role extends roleModal
{
    use HasFactory;

    protected $table = 'roles';

    const ROLE_SUPER_ADMIN = 'super_admin';
    const ROLE_ADMIN = 'admin';
    const ROLE_CLIENT = 'client';

    protected $fillable = [
        'name',
        'display_name',
        'is_default',
        'permission_id',
        'guard_name',
    ];

    public static $rules = [
        'display_name'  => 'required',
        'permission_id' => 'required',
    ];
}
