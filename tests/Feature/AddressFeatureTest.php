<?php

namespace Tests\Feature;

use App\Models\Address;
use App\Models\City;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Http\Response;
use Tests\TestCase;

class AddressFeatureTest extends TestCase
{
    use DatabaseMigrations;

    public function test_should_return_all_addresses(): void
    {
        $address = Address::factory()->create([
            'city_id' => City::factory()->create(),
        ]);

        $this->get('api/address')
            ->assertStatus(Response::HTTP_OK)
            ->assertJsonFragment([
                'id' => $address->id,
                'local' => $address->local,
            ]);
    }

    public function test_should_create_address_response_http_code_201(): void
    {
        $localName = 'Locale Test';

        $payload = [
            'local' => $localName,
            'number' => 267,
            'neighborhood' => 'Neighborhood Test',
            'city_id' => City::factory()->create()->id,
        ];

        $this->post('api/address', $payload)
            ->assertStatus(Response::HTTP_CREATED)
            ->assertJsonStructure(['local', 'number', 'neighborhood', 'city_id']);

        $this->assertDatabaseCount('addresses', 1);

        $this->assertDatabaseHas('addresses', [
            'local' => $localName,
        ]);
    }

    public function test_should_update_address_and_response_http_code_200(): void
    {
        $newLocal = 'NEW LOCAL UPDATED';
        $address  = Address::factory()->create([
            'city_id' => City::factory()->create(),
        ]);

        $this->put('api/address/' . $address->id, ['local' => $newLocal, ])
            ->assertStatus(Response::HTTP_OK);

        $this->assertDatabaseCount('addresses', 1);

        $this->assertDatabaseHas('addresses', [
            'local' => $newLocal,
        ]);
    }

    public function test_should_destroy_address_and_response_http_code_200(): void
    {
        $address  = Address::factory()->create([
            'city_id' => City::factory()->create(),
        ]);

        $response = $this->delete('api/address/' . $address->id)
            ->assertStatus(Response::HTTP_OK);

        $this->assertSoftDeleted($address);
        $this->assertTrue((bool)$response->getContent());
    }
}
