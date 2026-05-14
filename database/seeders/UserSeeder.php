<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    public function run(): void
    {
        $admin = User::firstOrCreate(
            ['email' => 'systemsadmin@wabagdda.com'],
            [
                'name' => 'Systems Admin',
                'password' => Hash::make('Password!123'),
            ]
        );
        $admin->syncRoles(['admin']);

        $projectOfficer = User::firstOrCreate(
            ['email' => 'projectofficer@wabagdda.com'],
            [
                'name' => 'Project Officer',
                'password' => Hash::make('password123'),
            ]
        );
        $projectOfficer->syncRoles(['project-officer']);

        $mediaOfficer = User::firstOrCreate(
            ['email' => 'mediaofficer@wabagdda.com'],
            [
                'name' => 'Media Officer',
                'password' => Hash::make('password123'),
            ]
        );
        $mediaOfficer->syncRoles(['media-officer']);
    }
}