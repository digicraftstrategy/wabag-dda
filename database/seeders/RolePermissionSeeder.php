<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RolePermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        app()[\Spatie\Permission\PermissionRegistrar::class]->forgetCachedPermissions();
       
        // Permissions
        $permissions = [
            'manage users',
            'manage settings',
            'manage news',
            'manage projects',
            'manage downloads',
            'manage media',
        ];

        foreach ($permissions as $permission) {
            Permission::firstOrCreate([
                'name' => $permission,
                'guard_name' => 'web',
            ]);
        }

        // Create core roles and assign permissions
        $rolesWithPermissions = [
            'admin' => Permission::all()->pluck('name')->toArray(),
            'project-officer' => [
                'manage news',
                'manage projects',
                'manage downloads',
            ],
            'media-officer' => [
                'manage news',
                'manage media',
            ],
        ];

        foreach ($rolesWithPermissions as $roleName => $perms) {
            $role = Role::firstOrCreate([
                'name' => $roleName,
                'guard_name' => 'web',
            ]);

            $role->syncPermissions($perms);
        }
    }
}
