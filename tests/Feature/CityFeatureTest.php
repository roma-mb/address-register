<?php

namespace Tests\Feature;

use App\Models\City;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Http\Response;
use Tests\TestCase;

class CityFeatureTest extends TestCase
{
    use DatabaseMigrations;

    public function test_should_return_all_cities(): void
    {
        $city = City::factory()->create();

        $this->get('api/city')
            ->assertStatus(Response::HTTP_OK)
            ->assertJsonFragment([
                'name' => $city->name,
                'reference' => $city->reference,
            ]);
    }

    public function test_should_return_an_city(): void
    {
        $city = City::factory()->create();

        $this->get('api/city/' . $city->id)
            ->assertStatus(Response::HTTP_OK)
            ->assertJsonFragment([
                'name' => $city->name,
                'reference' => $city->reference,
            ]);
    }

    public function test_should_return_404_when_city_not_found(): void
    {
        $this->get('api/city/' . 10)->assertStatus(404);
    }
}
