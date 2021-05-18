<?php

namespace Database\Factories;

use App\Models\Train;
use Illuminate\Database\Eloquent\Factories\Factory;

class TrainFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Train::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            Train::NAME     => $this->faker->unique()->colorName,
            Train::UUID     => $this->faker->uuid,
            Train::START_AT => $this->faker->dateTimeBetween(now(), now()->addYear()),
        ];
    }

}
