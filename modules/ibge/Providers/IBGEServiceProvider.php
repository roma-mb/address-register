<?php

namespace IBGE\Providers;

use IBGE\Console\Commands\CityImportCmd;
use Illuminate\Support\ServiceProvider;

class IBGEServiceProvider extends ServiceProvider
{
    /** @return void */
    public function register(): void
    {
    }

    /** @return void */
    public function boot(): void
    {
        $this->commands(CityImportCmd::class);
    }
}
