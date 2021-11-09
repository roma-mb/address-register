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
        'reference'
    ];

    public function address(): HasMany
    {
        return $this->hasMany(Address::class);
    }

    public static function adapter($array)
    {
        return [
            'name' => Arr::get($array, 'microrregiao.mesorregiao.nome', ''),
            'reference' => Arr::get($array, 'microrregiao.mesorregiao.id', ''),
        ];
    }
}
