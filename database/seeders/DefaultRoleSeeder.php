<?php

namespace Database\Seeders;

use App\Models\Role as CustomRole;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;

class DefaultRoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $roles = [
            [
                'name'         => CustomRole::ROLE_SUPER_ADMIN,
                'display_name' => 'Super Admin',
                'is_default'   => true,
            ],
            [
                'name'         => CustomRole::ROLE_ADMIN,
                'display_name' => 'Admin',
                'is_default'   => true,
            ],
            [
                'name'         => CustomRole::ROLE_CLIENT,
                'display_name' => 'Client',
                'is_default'   => true,
            ],
        ];

        foreach ($roles as $role) {
            $role = Role::create($role);
        }
    }
}
