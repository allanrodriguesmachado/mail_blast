<?php

namespace App\Models;

use Eloquent;
use Illuminate\Database\Eloquent\{Factories\HasFactory, Model, SoftDeletes};

/**
 * @property Eloquent
 */
class Subscribe extends Model
{
    use SoftDeletes;
    use HasFactory;
}
