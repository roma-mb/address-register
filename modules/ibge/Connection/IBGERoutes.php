<?php

declare(strict_types=1);

namespace IBGE\Connection;

use IBGE\Enumerations\IBGEEnum;
use Illuminate\Config\Repository;
use Illuminate\Contracts\Foundation\Application;

final class IBGERoutes
{
    private const COUNTY     = '/municipios';
    private const LOCALITIES = '/v1/localidades';
    private const STATES     = '/estados';

    public static function getCounty(int $fuId): string
    {
        return self::getUri() . self::LOCALITIES . self::STATES . "/{$fuId}" . self::COUNTY;
    }

    public static function getLocalitiesByUf(string $fu): string
    {
        return self::getUri() . self::LOCALITIES . self::STATES . "/{$fu}";
    }

    /** @return Repository|Application|mixed */
    private static function getUri()
    {
        return config('integrations.' . IBGEEnum::IBGE . '.api', '');
    }
}
