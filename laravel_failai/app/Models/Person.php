<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

/**
 * @property int $id
 * @property string $name
 * @property string $surname
 * @property string $personal_code
 * @property string $email
 * @property string $phone
 * @property int $user_id
 * @property int $address_id
 * @property Carbon $created_at
 * @property Carbon $updated_at
 */

class Person extends Model
{
    protected $guarded = [
        'address_id',
    ];

    protected $fillable = [
        'name',
        'surname',
        'personal_code',
        'email',
        'phone',
        'user_id',
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function address(): BelongsTo
    {
        return $this->belongsTo(Address::class);
    }
    public function orders(): HasMany
    {
        return $this->hasMany(related: Order::class);
    }
}
