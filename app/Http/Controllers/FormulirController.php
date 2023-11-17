<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class FormulirController extends Controller
{
    public function formulir() {
        // mengambil data dari table pegawais
    	$pegawais = DB::table('pegawais')->get();

 $title = "Formulir";
    	// mengirim data pegawais ke view index
    	return view('formulir.index',['pegawai' => $pegawais, 'title' => $title]);

    }
   // method untuk insert data ke table pegawai
public function store(Request $request)
{
	// insert data ke table pegawai
	DB::table('pegawais')->insert([
		'nama_pegawai' => $request->pegawai,
		'jabatan' => $request->jabatan,
		'jenis_kelamin' => $request->jk,
		'tempat_lahir' => $request->tempat_lahir,
		'tanggal_lahir' => $request->tanggal_lahir,
		'telepon' => $request->telepon,
		'alamat' => $request->alamat,
		'created_at' => $request->created_at,

	]);
 // Set session success message
    $request->session()->flash('Tambah', 'Data berhasil disimpan!');

	// alihkan halaman ke halaman pegawai
	return redirect('/formulir');

}

// update data pegawais
public function update(Request $request)
{
	// update data pegawais
	DB::table('pegawais')->where('id',$request->id)->update([
		'nama_pegawai' => $request->pegawai,
		'jabatan' => $request->jabatan,
		'jenis_kelamin' => $request->jk,
		'tempat_lahir' => $request->tempat_lahir,
		'tanggal_lahir' => $request->tanggal_lahir,
		'telepon' => $request->telepon,
		'alamat' => $request->alamat,
		'updated_at' => $request->updated_at,
	]);
     // Set session success message
    $request->session()->flash('Ubah', 'Data berhasil diubah!');
	// alihkan halaman ke halaman pegawai
	return redirect('/formulir');
}

// method untuk hapus data pegawai
public function hapus($id)
{
    // Menghapus data pegawai berdasarkan id yang dipilih
    DB::table('pegawais')->where('id', $id)->delete();

    // Set session success message
    request()->session()->flash('Hapus', 'Data berhasil dihapus!');

    // Alihkan halaman ke halaman formulir
    return redirect('/formulir');
}


}
