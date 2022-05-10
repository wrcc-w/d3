<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Stancl\Tenancy\Events\SavingTenant;
use Stancl\Tenancy\Events\TenantSaved;
use Stancl\Tenancy\Events\CreatingTenant;
use Stancl\Tenancy\Events\UpdatingTenant;
use Stancl\Tenancy\Events\TenantUpdated;
use Stancl\Tenancy\Events\DeletingTenant;
use Stancl\Tenancy\Events\TenantDeleted;
use Stancl\Tenancy\Database\Models\Tenant as BaseTenant;

class MultiTenant extends BaseTenant
{
    use HasFactory;

    protected $table = 'tenants';

    public static function getCustomColumns(): array
    {
        return [
            'id',
            'tenant_username',
        ];
    }
    
    protected $casts = [
        'data' => 'array',
    ];
    
    protected $dispatchesEvents = [
        'saving'   => SavingTenant::class,
        'saved'    => TenantSaved::class,
        'creating' => CreatingTenant::class,
        //'created' => TenantCreated::class,
        'updating' => UpdatingTenant::class,
        'updated'  => TenantUpdated::class,
        'deleting' => DeletingTenant::class,
        'deleted'  => TenantDeleted::class,
    ];

    /**
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user(){
        return $this->belongsTo(User::class,'id','tenant_id');
    }

}
