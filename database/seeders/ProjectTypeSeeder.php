<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProjectTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('project_types')->insert([
            [
                'type' => 'Infrastructure',
                'code' => 'INFRA',
                'description' => 'Roads, bridges, buildings, and other physical structures',
                'is_active' => true,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'type' => 'Health',
                'code' => 'HEALTH',
                'description' => 'Health services, facilities, and programs',
                'is_active' => true,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'type' => 'Education',
                'code' => 'EDUCATION',
                'description' => 'Schools, universities, and educational programs',
                'is_active' => true,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'type' => 'Community',
                'code' => 'COMMUNITY',
                'description' => 'Community services, programs, and initiatives',
                'is_active' => true,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'type' => 'Other',
                'code' => 'OTHER',
                'description' => 'Other types of projects',
                'is_active' => true,
                'created_at' => now(),
                'updated_at' => now()
            ]
        ]);
    }
}
