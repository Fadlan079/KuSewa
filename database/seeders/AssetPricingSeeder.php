<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AssetPricingSeeder extends Seeder
{
    public function run(): void
    {
        $assets = DB::table('assets')->get();


        foreach($assets as $asset){

            $subtotal = rand(100000,500000);

            $service = $subtotal * 0.05;

            DB::table('asset_pricings')->insert([
                'asset_id'=>$asset->id,
                'subtotal'=>$subtotal,
                'service_fee'=>$service,
                'total'=>$subtotal+$service,
                'created_at'=>now(),
                'updated_at'=>now()
            ]);

        }
    }
}
