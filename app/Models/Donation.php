<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;


class Donation extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'campaign_id',
        'amount',
    ];

    /**
     * @return BelongsTo<\App\Models\User, \App\Models\Donation>
     */
    public function user(): BelongsTo
    {
        /** @phpstan-ignore-next-line */
        return $this->belongsTo(User::class);
    }

    /**
     * @return BelongsTo<\App\Models\Campaign, \App\Models\Donation>
     */
    public function campaign(): BelongsTo
    {
        /** @phpstan-ignore-next-line */
        return $this->belongsTo(Campaign::class);
    }
}
