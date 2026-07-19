<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AssetCategorySeeder extends Seeder
{
    public function run(): void
    {
        DB::table('asset_categories')->insert([
            [
                'name' => 'Baliho',
                'icon' => 'fa-solid fa-sign-hanging',
            ],
            [
                'name' => 'Lahan',
                'icon' => 'fa-solid fa-map',
            ],
            [
                'name' => 'Villa',
                'icon' => 'fa-solid fa-house',
            ],
            [
                'name' => 'Rumah',
                'icon' => 'fa-solid fa-house-chimney',
            ],
            [
                'name' => 'Kos',
                'icon' => 'fa-solid fa-building',
            ],
            [
                'name' => 'Gedung',
                'icon' => 'fa-solid fa-city',
            ],
            [
                'name' => 'Gudang',
                'icon' => 'fa-solid fa-warehouse',
            ],
        ]);
    }
}
