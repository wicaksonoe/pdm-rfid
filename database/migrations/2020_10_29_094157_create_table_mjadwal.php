<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTableMjadwal extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('mjadwal', function (Blueprint $table) {
            $table->id();
            $table->string('kodemk');
            $table->string('kelas');
            $table->string('hari');
            $table->integer('kode_hari');
            $table->string('jam_in');
            $table->string('jam_out');
            $table->string('nidn');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('mjadwal');
    }
}
