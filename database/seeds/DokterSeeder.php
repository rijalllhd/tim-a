<?php

use Illuminate\Database\Seeder;
use App\dokter;

class DokterSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        dokter::create([
            'nama_dokter' => 'Karina Lapu Minator',
            'jenis_kelamin' => 'P',
            'telepon' => '08928393',
            'alamat' => 'Rumah'
        ]);
    }
}
