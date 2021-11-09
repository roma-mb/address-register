<?php

namespace App\Http\Controllers;

use App\Models\City;
use App\Services\CityService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Response;

class CityController extends Controller
{
    private CityService $cityService;

    public function __construct(CityService $cityService)
    {
        $this->cityService = $cityService;
    }

    public function index(): JsonResponse
    {
        return \response()
            ->json($this->cityService->getAll(), Response::HTTP_OK);
    }

    public function show(City $city): JsonResponse
    {
        return \response()
            ->json($city, Response::HTTP_OK);
    }
}
