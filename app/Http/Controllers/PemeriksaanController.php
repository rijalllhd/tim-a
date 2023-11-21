<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Pemeriksaan;

class PemeriksaanController extends Controller
{
    public function pemeriksaan() {
    $pemeriksaan = DB::table('pemeriksaans')->get();
    $title = "Pemeriksaan";
    $tabel_pasien = DB::table('pasien')->pluck('nama_pasien', 'id');
    $tabel_dokter = DB::table('dokters')->pluck('nama_dokter', 'id');
    return view('formulir.pemeriksaan', ['pemeriksaan' => $pemeriksaan, 'title' => $title, 'tabel_pasien' =>  $tabel_pasien, 'tabel_dokter' => $tabel_dokter]);
    }
}
