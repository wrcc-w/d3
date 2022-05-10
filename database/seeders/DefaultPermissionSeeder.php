<?php

namespace Database\Seeders;

use App\Models\Role as CustomRole;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class DefaultPermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $permissions = [
            [
                'name'         => 'manage_user',
                'display_name' => 'Manage User',
            ],
            [
                'name'         => 'manage_roles',
                'display_name' => 'Manage Roles',
            ],
        ];
        foreach ($permissions as $permission) {
            Permission::create($permission);
        }

        /** @var Role $adminRole */
        $adminRole = Role::whereName(CustomRole::ROLE_ADMIN)->first();

        $allPermission = Permission::pluck('name', 'id');
        $adminRole->givePermissionTo($allPermission);
    }
}
