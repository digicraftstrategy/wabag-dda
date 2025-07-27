<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call([
            NewsUpdateCategory::class,
            LlgSeeder::class,
            WardSeeder::class,

            ProjectTypeSeeder::class,
            FundingSourceSeeder::class,

            UserSeeder::class,

            RolePermissionSeeder::class, // ensure roles and permissions exist before assigning them to users
            UserSeeder::class,   // users + assignRole()

        ]);
    }
}
