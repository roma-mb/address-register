<?php

declare(strict_types=1);

namespace IBGE\Connection;

use Illuminate\Http\Client\Response;
use Illuminate\Support\Facades\Http;

class IBGEConnection
{
    /**
     * @param string $fu
     *
     * @return Response
     */
    public function getCountyByFU(string $fu): Response
    {
        return Http::get(IBGERoutes::getCounty($fu));
    }

    /**
     * @param string $fu
     *
     * @return Response
     */
    public function getLocalityByUf(string $fu): Response
    {
        return HTTP::get(IBGERoutes::getLocalitiesByUf($fu));
    }
}
