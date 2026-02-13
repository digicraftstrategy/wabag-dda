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
            //Dashboard
            'view dashboard',
            // User Management
            'manage users',
            'create users',
            'edit users',
            'view users',
            'delete users',

            // Role Management
            'manage roles',
            'create roles',
            'edit roles',
            'view roles',
            'delete roles',

            // Permission Management
            'manage permissions',
            'create permissions',
            'edit permissions',
            'view permissions',
            'delete permissions',

            // Funding Management
            'manage fundings',
            'create fundings',
            'edit fundings',
            'view fundings',
            'delete fundings',

             // Wards Management
            'manage wards',
            'create wards',
            'edit wards',
            'view wards',
            'delete wards',

             // LLGs Management
            'manage llgs',
            'create llgs',
            'edit llgs',
            'view llgs',
            'delete llgs',

            // News Management
            'manage news',
            'create news',
            'edit news',
            'view news',
            'delete news',

            // Projects Management
            'manage projects',
            'create projects',
            'edit projects',
            'view projects',
            'delete projects',

            // Media Management
            'manage downloads',
            'manage medias',
            'create medias',
            'edit medias',
            'view medias',
            'delete medias',
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
                // Projects Management
                'view dashboard',
                'manage projects',
                'create projects',
                'edit projects',
                'view projects',
                'delete projects',
                // Funding Management
                'manage fundings',
                'create fundings',
                'edit fundings',
                'view fundings',
                'delete fundings',
                // Wards Management
                'view wards',
                // LLGs Management
                'view llgs',
            ],

            'media-officer' => [
                // Media Management
                'view dashboard',
                'manage downloads',
                'manage medias',
                'create medias',
                'edit medias',
                'view medias',
                'delete medias',
                // News Management
                'manage news',
                'create news',
                'edit news',
                'view news',
                'delete news',
                // Wards Management
                'view wards',
                // LLGs Management
                'view llgs',
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
