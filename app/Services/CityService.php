<?php

namespace App\Services;

use App\Models\City;
use Illuminate\Database\Eloquent\Collection;

class CityService
{
    public function getAll(): Collection
    {
        return City::all();
    }
}
