<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Mdosens extends Model
{
    protected $table = 'mdosen';
    public $timestamps = false;

    protected $fillable = [
        'nidn','nama', 'programstudi'
    ];
}
