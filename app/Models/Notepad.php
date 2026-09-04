<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

class Notepad extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'user_id',
        'business_name',
        'owner_name',
        'mobile_number',
        'email_address',
        'billing_address',
        'product_pitched',
        'amount_quoted',
        'callback_date',
        'closer_name',
        'comments',
        'directory_link',
        'notes',
    ];

    protected function casts(): array
    {
        return [
            'callback_date' => 'date',
            'amount_quoted' => 'decimal:2',
        ];
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
