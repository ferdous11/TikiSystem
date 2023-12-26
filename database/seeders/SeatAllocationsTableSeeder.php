<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\SeatAllocation;
use App\Models\Trip;

class SeatAllocationsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $trip = Trip::find(1); // Assuming the trip with ID 1
        SeatAllocation::create(['trip_id' => $trip->id, 'seat_number' => 1]);
        SeatAllocation::create(['trip_id' => $trip->id, 'seat_number' => 2]);
    }
}
