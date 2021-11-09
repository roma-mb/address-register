<?php

namespace App\Http\Controllers;

use App\Http\Requests\AddressFormRequest;
use App\Models\Address;
use App\Services\AddressService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Response;

class AddressController extends Controller
{
    private AddressService $addressService;

    public function __construct(AddressService $addressService)
    {
        $this->addressService = $addressService;
    }

    public function index(): JsonResponse
    {
        return \response()
            ->json($this->addressService->getAll(), Response::HTTP_OK);
    }

    public function store(AddressFormRequest $request): JsonResponse
    {
        return \response()
            ->json($this->addressService->create($request->validated()), Response::HTTP_CREATED);
    }

    public function show(Address $address): Address
    {
        return $address;
    }

    public function update(AddressFormRequest $request, Address $address): bool
    {
        return $this->addressService->update($request->validated(), $address);
    }

    public function destroy(Address $address): ?bool
    {
        return $this->addressService->delete($address);
    }
}
