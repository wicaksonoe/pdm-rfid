<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTableTbabsensi extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbabsensi', function (Blueprint $table) {
            $table->id();
            $table->string('kodemk');
            $table->string('kelas');
            $table->string('nidn');
            $table->string('hari');
            $table->string('tanggal');
            $table->string('checkin');
            $table->string('checkout');
            $table->bigInteger('idjadwal');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tbabsensi');
    }
}
