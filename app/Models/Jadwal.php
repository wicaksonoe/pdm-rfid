<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Jadwal extends Model
{
    protected $table = 'mjadwal';
    public $timestamps = false;

    protected $fillable = [
        'kodemk','kelas','hari','kode_hari','jam_in','jam_out','nidn'
    ];
}
