<?php

use Illuminate\Database\Seeder;
use App\Pemeriksaan;

class PemeriksaanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
         $pemeriksaan = new Pemeriksaan;
        $pemeriksaan->id_pasien_pemeriksaan = '1';
        $pemeriksaan->id_dokter_pemeriksaan = '1';
        $pemeriksaan->gejala = 'Sakit Tenggorokan';
        $pemeriksaan->diagnosis = 'Sakit 2 hari lalu';
        $pemeriksaan->obat = 'BioFarma';
        $pemeriksaan->keterangan = 'Saya bayar make cash';
        $pemeriksaan->save();
    }
}
