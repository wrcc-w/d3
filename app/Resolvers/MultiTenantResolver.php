<?php

//declare(strict_types=1);

namespace App\Resolvers;

use Stancl\Tenancy\Contracts\Tenant;
use Stancl\Tenancy\Exceptions\TenantCouldNotBeIdentifiedByPathException;
use Illuminate\Support\Facades\Auth;

class MultiTenantResolver
{
    /**
     *
     */
    public function resolve(...$args): Tenant
    {

        if($tenant = tenancy()->find(Auth::user()->tenant_id)) {
            return $tenant;
        }

        throw new TenantCouldNotBeIdentifiedByPathException(Auth::user()->tenant_id);

    }


    public function getArgsForTenant(Tenant $tenant): array
    {
        return [
            [$tenant->id],
        ];
    }
}


