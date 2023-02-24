<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * @property int $id
 * @property string $name
 * @property string $type
 * @property Carbon $created_at
 * @property Carbon $updated_at
 * @method static where(string[] $array)
 */
class Status extends Model
{

    public const TYPES = ['order', 'payment', 'category', 'user', 'product', 'order_details'];
    public const STATE_NEW = 'Naujas';

    protected $fillable = [
        'name',
        'type',
    ];

    public function __toString(): string
    {
        return $this->name;
    }
}
