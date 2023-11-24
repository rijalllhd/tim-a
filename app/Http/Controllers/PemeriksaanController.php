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
    $tabel_dokter = DB::table('dokters')->pluck('nama_dokter', 'id');
    return view('formulir.pemeriksaan', ['pemeriksaan' => $pemeriksaan, 'title' => $title, 'tabel_dokter' => $tabel_dokter]);
    }

    public function store(Request $request) {
        $nama_dokter = DB::table('dokters')
        ->where('nama_dokter', $request->dokter)
        ->first();

        if($nama_dokter) {
            $request->session()->flash('Error', 'Oopss Nama Dokter Sudah Ada!');
            return redirect('/pemeriksaan');
        }

        DB::table('pemeriksaans')->insert([
            ''
        ]);
    }
}
