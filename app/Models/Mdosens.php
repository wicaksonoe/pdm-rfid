<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Mdosens extends Model
{
    protected $table = 'mdosen';

    protected $fillable = [
        'nidn','nama', 'programstudi'
    ];
}
