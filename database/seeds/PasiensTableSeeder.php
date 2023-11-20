<?php

use App\Pasiens;
use Illuminate\Database\Seeder;

class PasiensTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Pasiens::create([
            'nama_pasien' => 'fajar',
            'jenis_kelamin' => 'l',
            'tempat_lahir' => 'Bogor',
            'telepon' => '3182',
            'date' => '2005/11/03',
            'alamat' => 'Gardenia Ganteng'
        ]);
    }
}
