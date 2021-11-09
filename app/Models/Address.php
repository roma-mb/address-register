<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Arr;

class Address extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable = [
        'local',
        'number',
        'neighborhood',
        'city_id',
    ];

    public function city(): BelongsTo
    {
        return $this->belongsTo(City::class);
    }

    /**
     * @param Mixed[] $attributes
     * @return Mixed[]
     */
    public static function adapter(array $attributes): array
    {
        return [
            'local' => Arr::get($attributes, 'microrregiao.nome', ''),
            'number' => (int) Arr::get($attributes, 'microrregiao.numero', ''),
            'neighborhood' => Arr::get($attributes, 'nome', ''),
            'city_id' => (int) Arr::get($attributes, 'microrregiao.mesorregiao.id', ''),
        ];
    }
}
