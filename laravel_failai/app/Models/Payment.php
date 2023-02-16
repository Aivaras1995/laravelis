<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

/**
 * @property int $id
 * @property string $name
 * @property string $amount
 * @property int $status_id
 * @property Carbon $created_at
 * @property Carbon $updated_at
 */

class Payment extends Model
{
    use HasFactory;

    protected $guarded = [
        'status_id',
    ];

    protected $fillable = [
        'name',
        'amount',
    ];

    public function order(): BelongsTo
    {
        return $this->belongsTo(Orders::class);
    }

    public function status(): BelongsTo
    {
        return $this->belongsTo(Status::class);
    }
}
