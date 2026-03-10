<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class LlgSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $now = now();

        DB::table('llgs')->upsert([
            [
                'name' => 'Wabag Urban LLG',
                'code' => 'WU',
                'created_at' => $now,
                'updated_at' => $now,
            ],
            [
                'name' => 'Wabag Rural LLG',
                'code' => 'WR',
                'created_at' => $now,
                'updated_at' => $now,
            ],
            [
                'name' => 'Maramuni LLG',
                'code' => 'MM',
                'created_at' => $now,
                'updated_at' => $now,
            ],
        ], ['name'], ['code', 'updated_at']);
    }
}