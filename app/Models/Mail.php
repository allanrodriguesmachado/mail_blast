<?php

namespace App\Models;

use Illuminate\Database\Eloquent\{Model, SoftDeletes};

class Mail extends Model
{
    use SoftDeletes;

    public function subscribes()
    {
        return $this->hasMany(Subscribe::class);
    }
}
