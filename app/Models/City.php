<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Arr;

class City extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable = [
        'name',
        'state',
        'reference',
    ];

    public function address(): HasMany
    {
        return $this->hasMany(Address::class);
    }

    /**
     * @param Mixed[] $attributes
     *
     * @return Mixed[]
     */
    public static function adapter(array $attributes): array
    {
        return [
            'name' => Arr::get($attributes, 'microrregiao.mesorregiao.nome', ''),
            'state' => Arr::get($attributes, 'microrregiao.mesorregiao.UF.sigla', ''),
            'reference' => Arr::get($attributes, 'microrregiao.mesorregiao.id', ''),
        ];
    }
}
