<?php

namespace Database\Seeders;

use App\Models\Car;
use App\Models\Seat;
use App\Models\Train;
use Illuminate\Database\Seeder;

class TrainSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Train::factory()
            ->count(4)
            ->has(Car::factory()
                ->count(4)
                ->has(Seat::factory()
                    ->count(10)
                )
            )
            ->create();

    }
}
