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
            'nama_pegawai' => 'rizal',
            'jabatan' => 'Admin',
            'jenis_kelamin' => '1',
            'tempat_lahir' => 'Pemalang',
            'tanggal_lahir' => '2006-10-14',
            'telepon' => '8786',
            'alamat' => 'Cileungsi',
        ]);
    }
}
