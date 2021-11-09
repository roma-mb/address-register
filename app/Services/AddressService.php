<?php

namespace App\Services;

use App\Models\Address;
use Illuminate\Database\Eloquent\Collection;

class AddressService
{
    public function getAll(): Collection
    {
        return Address::all();
    }

    /**
     * @param Mixed[] $attributes
     *
     * @return Address
     */
    public function create(array $attributes): Address
    {
        return Address::firstOrCreate($attributes);
    }

    /**
     * @param Mixed[] $attributes
     * @param Address $address
     *
     * @return bool
     */
    public function update(array $attributes, Address $address): bool
    {
        return $address->update($attributes);
    }

    public function delete(Address $address): ?bool
    {
        return $address->delete();
    }
}
