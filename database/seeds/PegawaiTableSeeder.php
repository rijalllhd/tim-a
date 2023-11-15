<?php

use Illuminate\Database\Seeder;
use App\Pegawai;

class PegawaiTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Pegawai::create([
            'nama_pegawai' => 'rijal',
            'jabatan' => 'Dokter',
            'jenis_kelamin' => '2',
            'tempat_lahir' => 'Pemalang',
            'tanggal_lahir' => '2006-10-14',
            'telepon' => '8786',
            'alamat' => 'Cileungsi',
        ]);

        Pegawai::create([
            'nama_pegawai' => 'rzal',
            'jabatan' => 'admin',
            'jenis_kelamin' => '2',
            'tempat_lahir' => 'Bogor',
            'tanggal_lahir' => '2005-10-03',
            'telepon' => '8089',
            'alamat' => 'Cicadas',
        ]);
    }
}
