<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('users')->insert([
            [
                'name' => 'systems Admin',
                'email' => 'systemsadmin@test.com',
                'password' => bcrypt('password123'),
                'created_at' => now(),
                'updated_at' => now()
            ],
        ]);
    }
}
