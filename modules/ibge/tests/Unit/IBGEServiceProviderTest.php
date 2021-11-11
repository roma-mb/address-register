<?php

namespace IBGE\tests\Unit;

use IBGE\Providers\IBGEServiceProvider;
use Tests\TestCase;

class IBGEServiceProviderTest extends TestCase
{
    public function test_sould_return_ibge_service_provider_instance(): void
    {
        $provider = new IBGEServiceProvider(app());

        $this->assertInstanceOf(IBGEServiceProvider::class, $provider);
        $this->assertEquals(IBGEServiceProvider::class, get_class($provider));
    }
}
