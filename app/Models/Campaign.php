<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\{Model, Relations\BelongsTo, SoftDeletes};

class Campaign extends Model
{
    use HasFactory;
    use SoftDeletes;

    public function mail(): BelongsTo
    {
        return $this->belongsTo(Mail::class);
    }
}
