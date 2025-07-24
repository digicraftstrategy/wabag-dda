<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class FundingSourceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('funding_sources')->insert([
            [
                'funding_source' => 'District Services Improvement Program',
                'code' => 'DSIP',
                'description' => 'National government funding allocated to districts for infrastructure development',
                'type' => 'government',
                'government_level' => 'National',
                'recurring' => true,
                'fiscal_year' => 'FY2025',
                'is_active' => true,
                'created_at' => now(),
                'updated_at' => now()
            ],

            [
                'funding_source' => 'Provincial Services Improvement Program',
                'code' => 'PSIP',
                'description' => 'National government funding allocated to provinces for infrastructure development',
                'type' => 'government',
                'government_level' => 'National',
                'recurring' => true,
                'fiscal_year' => 'FY2024',
                'is_active' => true,
                'created_at' => now(),
                'updated_at' => now()
            ],

            [
                'funding_source' => 'District Development Authority',
                'code' => 'DDA',
                'description' => 'Local government funding allocated to districts for infrastructure development',
                'type' => 'government',
                'government_level' => 'District',
                'recurring' => true,
                'fiscal_year' => 'FY2024',
                'is_active' => true,
                'created_at' => now(),
                'updated_at' => now()
            ],

            [
                'funding_source' => 'Member Allocation',
                'code' => 'MA',
                'description' => 'Funds allocated by the parliamnent to members for infrastructure development',
                'type' => 'government',
                'government_level' => 'national',
                'recurring' => true,
                'fiscal_year' => 'FY2024',
                'is_active' => true,
                'created_at' => now(),
                'updated_at' => now()
            ],

            [
                'funding_source' => 'Australian Government Aid',
                'code' => 'AUS-AID',
                'description' => 'Development assistance from Australian government',
                'type' => 'donor',
                'government_level' => null,
                'recurring' => true,
                'fiscal_year' => null,
                'is_active' => true,
                'created_at' => now(),
                'updated_at' => now()
            ]
        ]);
    }
}
