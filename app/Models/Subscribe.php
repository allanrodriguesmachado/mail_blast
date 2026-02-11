<?php

namespace App\Models;

use Eloquent;
use Illuminate\Database\Eloquent\{Model, SoftDeletes};

/**
 * @property Eloquent
 */
class Subscribe extends Model
{
    use SoftDeletes;
}
