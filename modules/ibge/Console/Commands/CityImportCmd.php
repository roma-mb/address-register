<?php

namespace IBGE\Console\Commands;

use App\Models\City;
use IBGE\Connection\IBGEConnection;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Log;

class CityImportCmd extends Command
{
    /** @var string */
    protected $signature = 'city:import {state=SP}';

    /**  @var string */
    protected $description = 'Import Cities';

    private IBGEConnection $IBGEConnection;

    /** @return void */
    public function __construct(IBGEConnection $IBGEConnection)
    {
        parent::__construct();

        $this->IBGEConnection = $IBGEConnection;
    }

    /** @return void */
    public function handle(): void
    {
        try {
            $state    = $this->argument('state');
            $locality = $this->IBGEConnection->getLocalityByUf($state)->throw();

            $fuId     = (int) data_get($locality->json(), 'id', '');
            $counties = $this->IBGEConnection->getCountyByFU($fuId)->throw();

            $counties->collect()->each(static function ($values) {
                City::updateOrCreate(City::adapter($values));
            });
        } catch (\Exception $exception) {
            Log::alert($exception->getMessage());
        }
    }
}
