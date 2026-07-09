<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

#[Fillable([
    'full_name',
    'email',
    'phone_number',
    'picture',
    'birth_date',
    'user_id'
])]
class Contact extends Model
{
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
