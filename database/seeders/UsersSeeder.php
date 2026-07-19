<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UsersSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('users')->insert([
            [
                'name' => 'Owner KuSewa',
                'email' => 'owner@kusewa.com',
                'phone' => '081234567890',
                'role' => 'customer',
                'status' => 'active',
                'email_verified_at' => now(),
                'password' => Hash::make('password'),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Customer KuSewa',
                'email' => 'customer@kusewa.com',
                'phone' => '089876543210',
                'role' => 'customer',
                'status' => 'active',
                'email_verified_at' => now(),
                'password' => Hash::make('password'),
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
