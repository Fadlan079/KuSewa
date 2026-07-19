<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AssetPricingSeeder extends Seeder
{
    public function run(): void
    {
        $assets = DB::table('assets')->get();


        foreach ($assets as $asset) {


            // WAJIB harga per hari
            DB::table('asset_pricings')->insert([
                'asset_id' => $asset->id,

                'price' => fake()->randomElement([
                    100000,
                    150000,
                    250000,
                    500000
                ]),

                'period' => 'day',
                'is_primary' => true,

                'created_at'=>now(),
                'updated_at'=>now()
            ]);



            // Tambahan harga lain secara random
            $additionalPeriods = fake()->randomElements(
                [
                    'hour',
                    'week',
                    'month',
                    'year'
                ],
                fake()->numberBetween(1,3)
            );


            foreach($additionalPeriods as $period){

                DB::table('asset_pricings')->insert([

                    'asset_id' => $asset->id,

                    'price' => match($period){

                        'hour' => fake()->numberBetween(10000,50000),

                        'week' => fake()->numberBetween(500000,1500000),

                        'month' => fake()->numberBetween(2000000,8000000),

                        'year' => fake()->numberBetween(20000000,80000000),

                    },

                    'period'=>$period,

                    'created_at'=>now(),
                    'updated_at'=>now()
                ]);

            }

        }
    }
}
