<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Matkul extends Model
{
    protected $table = 'm_mk';
    public $timestamps = false;

    protected $fillable = [
        'kodemk','namamk'
    ];
}
