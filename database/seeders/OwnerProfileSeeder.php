<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class OwnerProfileSeeder extends Seeder
{
    public function run(): void
    {
        $owner = DB::table('users')
            ->where('email','owner@kusewa.com')
            ->first();


        DB::table('owner_profiles')->insert([
            'user_id' => $owner->id,
            'national_id' => '6471010101010001',
            'address' => 'Jl. Samarinda Sejahtera',
            'place_of_birth' => 'Samarinda',
            'date_of_birth' => '1995-05-10',
            'ktp_photo' => 'ktp_owner.jpg',
            'status' => 'verified',
            'verification_at' => now(),
            'created_at'=>now(),
            'updated_at'=>now()
        ]);
    }
}
