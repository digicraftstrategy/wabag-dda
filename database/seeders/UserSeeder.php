<?php

namespace Database\Seeders;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Seeder;


class UserSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('users')->insert([
            [
                'name' => 'Systems Admin',
                'email' => 'systemsadmin@test.com',
                'password' => Hash::make('password123'),
                'role' => 'admin', // 👈 Assigned here
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}

