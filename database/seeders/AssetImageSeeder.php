<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AssetImageSeeder extends Seeder
{
    public function run(): void
    {
        $assets = DB::table('assets')->get();


        foreach($assets as $asset){

            for($i=1;$i<=4;$i++){

                DB::table('asset_images')->insert([
                    'asset_id'=>$asset->id,
                    'image'=>"assets/asset_{$asset->id}_{$i}.jpg",
                    'created_at'=>now(),
                    'updated_at'=>now()
                ]);

            }
        }
    }
}
