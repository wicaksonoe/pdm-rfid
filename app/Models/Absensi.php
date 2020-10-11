<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Absensi extends Model
{
    protected $table = 'tbabsensi';

    protected $fillable = [
        'kodemk','kelas','nidn','hari','tanggal','checkin','checkout','nidn','idjadwal'
    ];
}
