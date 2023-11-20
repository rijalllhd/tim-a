<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class PenggunaController extends Controller
{
     public function pengguna() {
        // mengambil data dari table users
    	$users = DB::table('users')
    ->leftJoin('pegawais', 'users.id_user_pegawai', '=', 'pegawais.id')
    ->select('users.*', 'pegawais.nama_pegawai', 'pegawais.jabatan', 'pegawais.jenis_kelamin')
    ->get();

 $title = "Pengguna";
    	// mengirim data users ke view pengguna
    	return view('formulir.pengguna',['pengguna' => $users, 'title' => $title]);

    }
   // method untuk insert data ke table pegawai
public function store(Request $request)
{
	// insert data ke table pegawai
	DB::table('users')->insert([
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
	return redirect('/pengguna');

}

// update data users
public function update(Request $request)
{
	// update data users
	DB::table('users')->where('id',$request->id)->update([
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
	return redirect('/pengguna');
}

// method untuk hapus data pegawai
public function hapus($id)
{
    // Menghapus data pegawai berdasarkan id yang dipilih
    DB::table('users')->where('id', $id)->delete();

    // Set session success message
    request()->session()->flash('Hapus', 'Data berhasil dihapus!');

    // Alihkan halaman ke halaman pengguna
    return redirect('/pengguna');
}
}
