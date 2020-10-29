<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class InitSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::transaction(function () {
            DB::table('tbabsensi')->insert([
                [
                    'id'       => 6,
                    'kodemk'   => '1001',
                    'kelas'    => 'A',
                    'nidn'     => '0816077801',
                    'hari'     => 'Selasa',
                    'tanggal'  => '2020-09-08',
                    'checkin'  => '15:48',
                    'checkout' => '15:49',
                    'idjadwal' => 6,
                ],
                [
                    'id'       => 7,
                    'kodemk'   => '1002',
                    'kelas'    => 'C',
                    'nidn'     => '0816077801',
                    'hari'     => 'Kamis',
                    'tanggal'  => '2020-09-10',
                    'checkin'  => '09:00',
                    'checkout' => '10:20',
                    'idjadwal' => 7,
                ],
                [
                    'id'       => 8,
                    'kodemk'   => '1003',
                    'kelas'    => 'C',
                    'nidn'     => '0816077801',
                    'hari'     => 'Jumat',
                    'tanggal'  => '2020-09-12',
                    'checkin'  => '12:30',
                    'checkout' => '13:50',
                    'idjadwal' => 8,
                ],
            ]);

            DB::table('mjadwal')->insert([
                [
                    'id'        => 4,
                    'kodemk'    => '1001',
                    'kelas'     => 'A',
                    'hari'      => 'Rabu',
                    'kode_hari' => 3,
                    'jam_in'    => '11:00',
                    'jam_out'   => '15:30',
                    'nidn'      => '0816077801',
                ],
                [
                    'id'        => 5,
                    'kodemk'    => 'MK0091',
                    'kelas'     => 'A',
                    'hari'      => 'Selasa',
                    'kode_hari' => 2,
                    'jam_in'    => '19:00',
                    'jam_out'   => '21:30',
                    'nidn'      => '0816077801',
                ],
                [
                    'id'        => 6,
                    'kodemk'    => '1001',
                    'kelas'     => 'A',
                    'hari'      => 'Selasa',
                    'kode_hari' => 2,
                    'jam_in'    => '10:12',
                    'jam_out'   => '11:30',
                    'nidn'      => '0816077801',
                ],
                [
                    'id'        => 7,
                    'kodemk'    => '1002',
                    'kelas'     => 'C',
                    'hari'      => 'Kamis',
                    'kode_hari' => 4,
                    'jam_in'    => '09:00',
                    'jam_out'   => '10:20',
                    'nidn'      => '0816077801',
                ],
                [
                    'id'        => 8,
                    'kodemk'    => '1003',
                    'kelas'     => 'C',
                    'hari'      => 'Jumat',
                    'kode_hari' => 5,
                    'jam_in'    => '12:30',
                    'jam_out'   => '14:00',
                    'nidn'      => '0930910',
                ],
                [
                    'id'        => 9,
                    'kodemk'    => '1001',
                    'kelas'     => 'D',
                    'hari'      => 'Senin',
                    'kode_hari' => 1,
                    'jam_in'    => '17:20',
                    'jam_out'   => '20:00',
                    'nidn'      => '0816077801',
                ],
                [
                    'id'        => 10,
                    'kodemk'    => '1002',
                    'kelas'     => 'A',
                    'hari'      => 'Minggu',
                    'kode_hari' => 0,
                    'jam_in'    => '18:00',
                    'jam_out'   => '20:00',
                    'nidn'      => '0816077801',
                ],
                [
                    'id'        => 11,
                    'kodemk'    => '1001',
                    'kelas'     => 'B',
                    'hari'      => 'Selasa',
                    'kode_hari' => 2,
                    'jam_in'    => '15:00',
                    'jam_out'   => '17:30',
                    'nidn'      => '0816077801',
                ],
            ]);

            DB::table('mdosen')->insert([
                'id' => 5,
                'nidn' => '0816077801',
                'nama' => 'I GEDE SUJANA EKA PUTRA',
                'programstudi' => 'Teknik Informatika',
            ]);

            DB::table('m_mk')->insert([
                [
                    'id'     => 1,
                    'kodemk' => '1001',
                    'namamk' => 'Algoritma Pemrograman',
                ],
                [
                    'id'     => 2,
                    'kodemk' => '1002',
                    'namamk' => 'Basis Data',
                ],
                [
                    'id'     => 3,
                    'kodemk' => '1003',
                    'namamk' => 'Pengantar Akuntansi',
                ],
            ]);
        });
    }
}
