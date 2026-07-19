<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AssetSeeder extends Seeder
{
    public function run(): void
    {
        $owner = DB::table('owner_profiles')->first();

        $categories = DB::table('asset_categories')->get();


        foreach($categories as $category){

            for($i=1;$i<=3;$i++){

                DB::table('assets')->insert([
                    'owner_profile_id'=>$owner->id,
                    'asset_category_id'=>$category->id,
                    'title'=>$category->name." ".$i,
                    'description'=>"Aset {$category->name} tersedia untuk disewa.",
                    'detail'=>json_encode([
                        'capacity'=>'100 orang',
                        'facility'=>[
                            'parkir',
                            'toilet',
                            'wifi'
                        ]
                    ]),
                    'province'=>'Kalimantan Timur',
                    'city'=>'Samarinda',
                    'address'=>"Jl. {$category->name} No {$i}",
                    'latitude'=>'-0.502106',
                    'longitude'=>'117.153709',
                    'status'=>'active',
                    'created_at'=>now(),
                    'updated_at'=>now()
                ]);
            }
        }
    }
}
