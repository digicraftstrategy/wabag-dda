<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call([
            RolePermissionSeeder::class,
            UserSeeder::class,
            ProjectTypeSeeder::class,
            FundingSourceSeeder::class,
            LlgSeeder::class,
            WardSeeder::class,
            ProjectSeeder::class,
            NewsUpdateCategorySeeder::class, // ✅ Correct Arrangement
            NewsUpdateSeeder::class,
            ExploreWabagSeeder::class,
            ExploreWabagDetailedSeeder::class,

        ]);
    }
}
