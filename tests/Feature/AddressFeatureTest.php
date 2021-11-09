<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class AddressFeatureTest extends TestCase
{
    public function test_should_return_all_addresses()
    {
        $response = $this->get('api/address');

        dd($response);

        $response->assertStatus(200);
    }
}
