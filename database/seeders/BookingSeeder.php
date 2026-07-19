<?php

namespace Database\Seeders;

use App\Models\asset;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class BookingSeeder extends Seeder
{
    public function run(): void
    {
        $assets = asset::with('pricings')->get();

        foreach ($assets as $index => $asset) {

            $pricing = $asset->pricings()
                ->where('period', 'day')
                ->first();

            if (!$pricing) {
                continue;
            }


            DB::table('bookings')->insert([
                'asset_id' => $asset->id,
                'asset_pricing_id' => $pricing->id,
                'user_id' => 2,
                'start_date' => now()->addDays($index + 1),
                'end_date' => now()->addDays($index + 4),
                'booking_status' => 'accepted',
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
