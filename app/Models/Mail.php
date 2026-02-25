<?php

namespace App\Models;

use Illuminate\Database\Eloquent\{Factories\HasFactory, Model, SoftDeletes};

class Mail extends Model
{
    use SoftDeletes;
    use HasFactory;
    public function subscribes()
    {
        return $this->hasMany(Subscribe::class);
    }
}
