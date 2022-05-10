<?php

namespace App\DataTables;

use App\Models\Role;

/**
 * Class RoleDataTable
 */
class RoleDataTable
{
    /**
     * @return Role
     */
    public function get()
    {
        /** @var Role $query */
        $query = Role::with('permissions')->select('roles.*');

        return $query;
    }
}
