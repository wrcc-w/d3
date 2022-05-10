<?php

namespace App\Models;

use App\Traits\Multitenantable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Stancl\Tenancy\Database\Concerns\BelongsToTenant;

class InvoiceSetting extends Model
{
    use HasFactory, BelongsToTenant, Multitenantable;

    protected $table = "invoice-settings";
    protected $fillable = ['key', 'template_name', 'template_color', 'tenant_id'];
}
