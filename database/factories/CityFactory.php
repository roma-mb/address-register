<?php

namespace Database\Factories;

use App\Models\City;
use Illuminate\Database\Eloquent\Factories\Factory;

class CityFactory extends Factory
{
    /** @var string */
    protected $model = City::class;

    /** @return Mixed[] */
    public function definition(): array
    {
        return [
            'name' => $this->faker->city,
            'reference' => $this->faker->randomNumber(4),
        ];
    }
}
