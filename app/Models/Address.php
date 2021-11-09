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

    public static function adapter($array): array
    {
        return [
            'local' => Arr::get($array, 'microrregiao.nome', ''),
            'number' => (int) Arr::get($array, 'microrregiao.numero', ''),
            'neighborhood' => Arr::get($array, 'nome', ''),
            'city_id' => (int) Arr::get($array, 'microrregiao.mesorregiao.id', '')
        ];
    }
}
