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
        $user = User::create([
            'name' => 'Systems Admin',
            'email' => 'systemsadmin@test.com',
            'password' => Hash::make('password123'),
        ]);
        $user->assignRole('admin'); // Correct way

        $user = User::create([
            'name' => 'Project Officer',
            'email' => 'projectofficer@test.com',
            'password' => Hash::make('password123'),
        ]);
        $user->assignRole('project-officer');

        $user = User::create([
            'name' => 'Media Officer',
            'email' => 'mediaofficer@test.com',
            'password' => Hash::make('password123'),
        ]);
        $user->assignRole('media-officer');
    }
}