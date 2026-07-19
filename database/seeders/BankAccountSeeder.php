<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class BankAccountSeeder extends Seeder
{
    public function run(): void
    {
        $owner = DB::table('owner_profiles')->first();


        DB::table('bank_accounts')->insert([
            [
                'owner_profile_id'=>$owner->id,
                'bank_name'=>'BCA',
                'account_number'=>'1234567890',
                'account_holder'=>'Owner KuSewa',
                'status'=>'active',
                'created_at'=>now(),
                'updated_at'=>now()
            ],
            [
                'owner_profile_id'=>$owner->id,
                'bank_name'=>'Mandiri',
                'account_number'=>'9876543210',
                'account_holder'=>'Owner KuSewa',
                'status'=>'active',
                'created_at'=>now(),
                'updated_at'=>now()
            ]
        ]);
    }
}
