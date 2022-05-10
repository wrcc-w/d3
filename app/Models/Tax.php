<?php

namespace App\Models;

use App\Traits\Multitenantable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Stancl\Tenancy\Database\Concerns\BelongsToTenant;

class Tax extends Model
{
    use HasFactory, BelongsToTenant, Multitenantable;

    protected $table = 'taxes';

    protected $fillable = ['name', 'value', 'is_default', 'tenant_id'];

    public static $rules = [
        'name'  => 'required|is_unique:taxes,name|max:191',
        'value' => 'required|numeric',
    ];
}
