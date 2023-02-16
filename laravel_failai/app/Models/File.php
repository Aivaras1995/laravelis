<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Relations\HasMany;


/**
 * @property int $id
 * @property string $name
 * @property string $path
 * @property string $extension
 * @property string $size
 * @property string $url
 * @property int $model_id
 * @property string $model_type
 * @property Carbon $created_at
 * @property Carbon $updated_at
 */
class File extends Model
{
    protected $fillable = [
        'name',
        'path',
        'extension',
        'size',
        'url',
        'model_id',
        'model_type',

        ];

    public function products(): HasMany
    {
        return $this->hasMany(Products::class);
    }
    public function person(): HasMany
    {
        return $this->hasMany(Person::class);
    }
}
