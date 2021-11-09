<?php

namespace App\Http\Requests;

use Illuminate\Support\Arr;

class AddressFormRequest extends FormRequestAbstract
{
    protected $stopOnFirstFailure = true;

    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        $method = $this->route()->getActionMethod();

        return Arr::get([
            'store' => self::store(),
            'update' => self::update(),
        ], $method, []);
    }

    private static function store(): array
    {
        return [
            'local' => 'required|string|max:255',
            'number' => 'required|integer',
            'neighborhood' => 'required|string|max:126',
            'city_id' => 'required|integer',
        ];
    }

    private static function update(): array
    {
        return [
            'local' => 'sometimes|string|max:255',
            'number' => 'sometimes|integer',
            'neighborhood' => 'sometimes|string|max:126',
            'city_id' => 'sometimes|integer',
        ];
    }
}
