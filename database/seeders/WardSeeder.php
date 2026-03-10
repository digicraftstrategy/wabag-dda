<?php

namespace Database\Seeders;

use App\Models\Ward;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class WardSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $llgs = DB::table('llgs')->pluck('id', 'name');

        $wards = [
            // Wabag Urban LLG
            ['ward_number' => 1, 'name' => 'Police Barracks', 'llg_id' => $llgs['Wabag Urban LLG']],
            ['ward_number' => 2, 'name' => 'Beat Street', 'llg_id' => $llgs['Wabag Urban LLG']],
            ['ward_number' => 3, 'name' => 'Langares', 'llg_id' => $llgs['Wabag Urban LLG']],
            ['ward_number' => 4, 'name' => 'Premiers Hill', 'llg_id' => $llgs['Wabag Urban LLG']],
            ['ward_number' => 5, 'name' => 'Keas Hidden Valley', 'llg_id' => $llgs['Wabag Urban LLG']],
            ['ward_number' => 6, 'name' => 'Aipus Newtown', 'llg_id' => $llgs['Wabag Urban LLG']],
            ['ward_number' => 7, 'name' => 'Wabag Secondary School', 'llg_id' => $llgs['Wabag Urban LLG']],

            // Wabag Rural LLG
            ['ward_number' => 1, 'name' => 'Tukusanda', 'llg_id' => $llgs['Wabag Rural LLG']],
            ['ward_number' => 2, 'name' => 'Aipanda', 'llg_id' => $llgs['Wabag Rural LLG']],
            ['ward_number' => 3, 'name' => 'Tambitanis', 'llg_id' => $llgs['Wabag Rural LLG']],
            ['ward_number' => 4, 'name' => 'Lakolam', 'llg_id' => $llgs['Wabag Rural LLG']],
            ['ward_number' => 5, 'name' => 'Kubalis', 'llg_id' => $llgs['Wabag Rural LLG']],
            ['ward_number' => 6, 'name' => 'Nandi', 'llg_id' => $llgs['Wabag Rural LLG']],
            ['ward_number' => 7, 'name' => 'Sakarip', 'llg_id' => $llgs['Wabag Rural LLG']],
            ['ward_number' => 8, 'name' => 'Sopas', 'llg_id' => $llgs['Wabag Rural LLG']],
            ['ward_number' => 9, 'name' => 'Kiwi No. 1', 'llg_id' => $llgs['Wabag Rural LLG']],
            ['ward_number' => 10, 'name' => 'Kaiap', 'llg_id' => $llgs['Wabag Rural LLG']],
            ['ward_number' => 11, 'name' => 'Kamas', 'llg_id' => $llgs['Wabag Rural LLG']],
            ['ward_number' => 12, 'name' => 'Kopen', 'llg_id' => $llgs['Wabag Rural LLG']],
            ['ward_number' => 13, 'name' => 'Sari', 'llg_id' => $llgs['Wabag Rural LLG']],
            ['ward_number' => 14, 'name' => 'Sore', 'llg_id' => $llgs['Wabag Rural LLG']],
            ['ward_number' => 15, 'name' => 'Teremanda', 'llg_id' => $llgs['Wabag Rural LLG']],
            ['ward_number' => 16, 'name' => 'Wabag', 'llg_id' => $llgs['Wabag Rural LLG']],
            ['ward_number' => 17, 'name' => 'Lakemanda', 'llg_id' => $llgs['Wabag Rural LLG']],
            ['ward_number' => 18, 'name' => 'Sakales', 'llg_id' => $llgs['Wabag Rural LLG']],
            ['ward_number' => 19, 'name' => 'Keas/Pauas', 'llg_id' => $llgs['Wabag Rural LLG']],
            ['ward_number' => 20, 'name' => 'Arelya/Aipus', 'llg_id' => $llgs['Wabag Rural LLG']],
            ['ward_number' => 21, 'name' => 'Wakumale', 'llg_id' => $llgs['Wabag Rural LLG']],
            ['ward_number' => 22, 'name' => 'Lenki/Pipi', 'llg_id' => $llgs['Wabag Rural LLG']],
            ['ward_number' => 23, 'name' => 'Ainumanda', 'llg_id' => $llgs['Wabag Rural LLG']],
            ['ward_number' => 24, 'name' => 'Rakamanda', 'llg_id' => $llgs['Wabag Rural LLG']],
            ['ward_number' => 25, 'name' => 'Yokomanda', 'llg_id' => $llgs['Wabag Rural LLG']],
            ['ward_number' => 26, 'name' => 'Imi', 'llg_id' => $llgs['Wabag Rural LLG']],
            ['ward_number' => 27, 'name' => 'Wei', 'llg_id' => $llgs['Wabag Rural LLG']],
            ['ward_number' => 28, 'name' => 'Birip', 'llg_id' => $llgs['Wabag Rural LLG']],
            ['ward_number' => 29, 'name' => 'Akom', 'llg_id' => $llgs['Wabag Rural LLG']],
            ['ward_number' => 30, 'name' => 'Lukirap', 'llg_id' => $llgs['Wabag Rural LLG']],
            ['ward_number' => 31, 'name' => 'Yokomanda', 'llg_id' => $llgs['Wabag Rural LLG']],
            ['ward_number' => 32, 'name' => 'Lakopenda', 'llg_id' => $llgs['Wabag Rural LLG']],
            ['ward_number' => 33, 'name' => 'Yailengis', 'llg_id' => $llgs['Wabag Rural LLG']],
            ['ward_number' => 34, 'name' => 'Tumbilam', 'llg_id' => $llgs['Wabag Rural LLG']],
            ['ward_number' => 35, 'name' => 'Aiyokolam', 'llg_id' => $llgs['Wabag Rural LLG']],
            ['ward_number' => 36, 'name' => 'Keas-Upper Lai', 'llg_id' => $llgs['Wabag Rural LLG']],
            ['ward_number' => 37, 'name' => 'Komaites', 'llg_id' => $llgs['Wabag Rural LLG']],
            ['ward_number' => 38, 'name' => 'Kiwi No. 2', 'llg_id' => $llgs['Wabag Rural LLG']],
            ['ward_number' => 39, 'name' => 'Amala', 'llg_id' => $llgs['Wabag Rural LLG']],
            ['ward_number' => 40, 'name' => 'Manjop', 'llg_id' => $llgs['Wabag Rural LLG']],
            ['ward_number' => 41, 'name' => 'Pandam', 'llg_id' => $llgs['Wabag Rural LLG']],
            ['ward_number' => 42, 'name' => 'Wanomanda', 'llg_id' => $llgs['Wabag Rural LLG']],
            ['ward_number' => 43, 'name' => 'Makapumanda', 'llg_id' => $llgs['Wabag Rural LLG']],
            ['ward_number' => 44, 'name' => 'Yokota', 'llg_id' => $llgs['Wabag Rural LLG']],
            ['ward_number' => 45, 'name' => 'Peaulam', 'llg_id' => $llgs['Wabag Rural LLG']],

            // Maramuni LLG
            ['ward_number' => 1, 'name' => 'Biak/Pai', 'llg_id' => $llgs['Maramuni LLG']],
            ['ward_number' => 2, 'name' => 'Malaumanda/Pokale', 'llg_id' => $llgs['Maramuni LLG']],
            ['ward_number' => 3, 'name' => 'Pasalagus', 'llg_id' => $llgs['Maramuni LLG']],
            ['ward_number' => 4, 'name' => 'Wailep', 'llg_id' => $llgs['Maramuni LLG']],
            ['ward_number' => 5, 'name' => 'Tonori', 'llg_id' => $llgs['Maramuni LLG']],
            ['ward_number' => 6, 'name' => 'Kaimtok', 'llg_id' => $llgs['Maramuni LLG']],
            ['ward_number' => 7, 'name' => 'Wangalongen', 'llg_id' => $llgs['Maramuni LLG']],
            ['ward_number' => 8, 'name' => 'Nelyauk', 'llg_id' => $llgs['Maramuni LLG']],
            ['ward_number' => 9, 'name' => 'Ilya', 'llg_id' => $llgs['Maramuni LLG']],
            ['ward_number' => 10, 'name' => 'Poreak', 'llg_id' => $llgs['Maramuni LLG']],
            ['ward_number' => 11, 'name' => 'Warakom', 'llg_id' => $llgs['Maramuni LLG']],
            ['ward_number' => 12, 'name' => 'Penale', 'llg_id' => $llgs['Maramuni LLG']],
            ['ward_number' => 13, 'name' => 'Ned', 'llg_id' => $llgs['Maramuni LLG']],
        ];

        foreach ($wards as $ward) {
            Ward::updateOrCreate(
                [
                    'llg_id' => $ward['llg_id'],
                    'ward_number' => $ward['ward_number'],
                ],
                [
                    'name' => $ward['name'],
                ]
            );
        }
    }
}