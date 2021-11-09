<?php

namespace IBGE\tests\Unit;

use IBGE\Connection\IBGERoutes;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Http;
use Tests\TestCase;

class CityImportCmdTest extends TestCase
{
    use DatabaseMigrations;

    protected function setUp(): void
    {
        parent::setUp();

        Http::fake([
            IBGERoutes::getLocalitiesByUf('SP') => Http::response(self::localityResponse()),
            IBGERoutes::getCounty(35) => Http::response(self::countyResponse()),
        ]);
    }

    public function test_my_command_here(): void
    {
        Artisan::call('city:import SP');
        $this->assertDatabaseCount('cities', 1);
    }

    private static function localityResponse()
    {
        return [
            'id' => 35,
            'sigla' => 'SP',
            'nome' => 'São Paulo',
            'regiao' =>  [
                'id' => 3,
                'sigla' => 'SE',
                'nome' => 'Sudeste',
            ],
        ];
    }

    private static function countyResponse()
    {
        return [
            'id' => 3500105,
            'nome' => 'Adamantina',
            'microrregiao' => [
                'id' => 35035,
                'nome' => 'Adamantina',
                'mesorregiao' => [
                    'id' => 3508,
                    'nome' => 'Presidente Prudente',
                    'UF' => [
                        'id' => 35,
                        'sigla' => 'SP',
                        'nome' => 'São Paulo',
                        'regiao' => [
                            'id' => 3,
                            'sigla' => 'SE',
                            'nome' => 'Sudeste',
                        ],
                    ],
                ],
            ],
            'regiao-imediata' => [
                'id' => 350019,
                'nome' => 'Adamantina - Lucélia',
                'regiao-intermediaria' => [
                    'id' => 3505,
                    'nome' => 'Presidente Prudente',
                    'UF' => [
                        'id' => 35,
                        'sigla' => 'SP',
                        'nome' => 'São Paulo',
                        'regiao' => [
                            'id' => 3,
                            'sigla' => 'SE',
                            'nome' => 'Sudeste',
                        ],
                    ],
                ],
            ],
        ];
    }
}
