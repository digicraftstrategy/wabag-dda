<?php

namespace Database\Seeders;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Seeder;
use App\Models\User;


class UserSeeder extends Seeder
{
    public function run()
    {
        $admin = User::create([
            'name' => 'Systems Admin',
            'email' => 'systemsadmin@test.com',
            'password' => Hash::make('password123'),
        ]);
        $admin->assignRole('admin'); // Correct way

        $projectOfficer = User::create([
            'name' => 'Project Officer',
            'email' => 'projectofficer@test.com',
            'password' => Hash::make('password123'),
        ]);
        $projectOfficer->assignRole('project-officer');

        $mediaOfficer = User::create([
            'name' => 'Media Officer',
            'email' => 'mediaofficer@test.com',
            'password' => Hash::make('password123'),
        ]);
        $mediaOfficer->assignRole('media-officer');
    }
}