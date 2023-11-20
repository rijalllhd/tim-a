<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DokterController extends Controller
{
    public function dokter() {
        // mengambil data dari table users
    	$users = DB::table('dokters')->get();


 $title = "Dokter";
    	// mengirim data users ke view dokter
    	return view('formulir.dokter',['dokter' => $users,  'title' => $title]);

    }
   // method untuk insert data ke table pegawai
public function store(Request $request)
{
    // Cek apakah id_user_pegawai sudah ada di tabel users
    $existingUser = DB::table('dokters')
        ->where('nama_dokter', $request->dokter)
        ->first();

    // Jika id_user_pegawai sudah ada, kembalikan respons dengan pesan error
    if ($existingUser) {
         $request->session()->flash('Error', 'Opps, Nama Dokter Sudah Ada!');
        return redirect('/dokter');
    }

    // Jika nama dokter belum ada, lanjutkan penyisipan data
    DB::table('dokters')->insert([
        'nama_dokter' => $request->dokter,
        'jenis_kelamin' => $request->jenis_kelamin,
        'telepon' => $request->nohp,
        'alamat' => $request->alamat,
        'created_at' => $request->created_at,
    ]);

    // Set session success message
    $request->session()->flash('Tambah', 'Data berhasil disimpan!');

    // Alihkan halaman ke halaman dokter
    return redirect('/dokter');
}


// update data users
public function update(Request $request)
{
    // Ambil data lama user dari database
    $oldUserData = DB::table('dokters')->where('id', $request->id)->first();

    // Validasi jika nama_dokter dan pegawai tidak diubah, gunakan data lama
    if ($oldUserData->nama_dokter == $request->nama_dokter) {
        $dokter = $oldUserData->nama_dokter;
    } else {
        // Jika nama_dokter atau pegawai diubah, validasi apakah data sudah ada di database
        $existingUser = DB::table('dokters')
            ->where('nama_dokter', $request->nama_dokter)
            ->first();

              if ($existingUser) {
            $request->session()->flash('Error', 'Opps, Nama Dokter Sudah Ada!');
            return redirect('/dokter');
        }

         $dokter = $request->nama_dokter;

    }



    // Update data dokters
    DB::table('dokters')->where('id', $request->id)->update([
        'nama_dokter' => $dokter,
        'jenis_kelamin' => $request->jenis_kelamin,
        'telepon' => $request->nohp,
        'alamat' => $request->alamat,
        'updated_at' => $request->updated_at,
    ]);

    // Set session success message
    $request->session()->flash('Ubah', 'Data berhasil diubah!');

    // Alihkan halaman ke halaman pegawai
    return redirect('/dokter');
}


// method untuk hapus data pegawai
public function hapus($id)
{
    // Menghapus data pegawai berdasarkan id yang dipilih
    DB::table('dokters')->where('id', $id)->delete();

    // Set session success message
    request()->session()->flash('Hapus', 'Data berhasil dihapus!');

    // Alihkan halaman ke halaman dokter
    return redirect('/dokter');
}
}
