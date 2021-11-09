<?php

namespace Database\Factories;

use App\Models\Address;
use Illuminate\Database\Eloquent\Factories\Factory;

class AddressFactory extends Factory
{
    /** @var string */
    protected $model = Address::class;

    /** @return Mixed[] */
    public function definition(): array
    {
        return [
            'local' => $this->faker->streetAddress,
            'number' => $this->faker->randomNumber(),
            'neighborhood' => $this->faker->locale,
            'city_id' => 1,
        ];
    }
}
