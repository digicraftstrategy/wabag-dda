<?php

namespace Database\Seeders;

use App\Models\Llg;
use Illuminate\Database\Seeder;

class LlgSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Llg::updateOrCreate(
            ['name' => 'Wabag Urban LLG'],
            ['code' => 'WU']
        );

        Llg::updateOrCreate(
            ['name' => 'Wabag Rural LLG'],
            ['code' => 'WR']
        );

        Llg::updateOrCreate(
            ['name' => 'Maramuni LLG'],
            ['code' => 'MM']
        );
    }
}