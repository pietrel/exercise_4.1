<?php

namespace Database\Factories;

use App\Models\Seat;
use App\Models\Train;
use Illuminate\Database\Eloquent\Factories\Factory;

class SeatFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Seat::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        static $order = 1;
        if ($order > $this->count) {
            $order = 1;
        }

        $rank = $this->faker->randomElement([1, 2]);

        return [
            Seat::NAME   => "S" . $order++,
            Seat::TYPE   => $this->faker->randomElement(['W', 'M', 'A']),
            Seat::UUID   => $this->faker->uuid,
            Seat::RANK   => $rank,
            Seat::PRICE  => ($rank == 1) ? 30.5 : 12.3,
        ];
    }


}
