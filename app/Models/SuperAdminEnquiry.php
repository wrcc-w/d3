<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SuperAdminEnquiry extends Model
{
    use HasFactory;

    public $table = 'super_admin_enquiries';

    public $fillable = [
        'full_name',
        'email',
        'message',
        'status',
    ];

    const ALL = 2;
    const READ = 1;
    const UNREAD = 0;

    const STATUS_ARR = [
        self::ALL    => 'All',
        self::READ   => 'Read',
        self::UNREAD => 'Unread',
    ];

    /**
     * The attributes that should be casted to native types.
     * @var array
     */
    protected $casts = [
        'id'        => 'integer',
        'full_name' => 'string',
        'email'     => 'string',
        'message'   => 'string',
        'status'    => 'boolean',
    ];

    /**
     * Validation rules
     * @var array
     */
    public static $rules = [
        'full_name' => 'required|max:191',
        'email'     => 'required|email:filter',
        'message'   => 'required|max:5000',
    ];
}
