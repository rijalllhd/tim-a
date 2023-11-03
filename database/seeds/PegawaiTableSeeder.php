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
            'nama_pegawai' => 'yuwan',
            'jabatan' => 'Security',
            'jenis_kelamin' => '2',
            'tempat_lahir' => 'Bogor',
            'tanggal_lahir' => '2005-10-03',
            'telepon' => '8089',
            'alamat' => 'Cicadas',
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
