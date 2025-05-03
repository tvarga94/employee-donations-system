<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Campaign extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'title',
        'description',
        'target_amount',
        'is_active',
    ];

    /**
     * @return BelongsTo<\App\Models\User, \App\Models\Campaign>
     */
    public function user(): BelongsTo
    {
        /** @phpstan-ignore-next-line */
        return $this->belongsTo(User::class);
    }

    /**
     * @return HasMany<\App\Models\Donation, \App\Models\Campaign>
     */
    public function donations(): HasMany
    {
        /** @phpstan-ignore-next-line */
        return $this->hasMany(Donation::class);
    }
}
