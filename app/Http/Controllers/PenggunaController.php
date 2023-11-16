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

     $pegawaiData = DB::table('pegawais')->pluck('nama_pegawai', 'id');

 $title = "Pengguna";
    	// mengirim data users ke view pengguna
    	return view('formulir.pengguna',['pengguna' => $users, 'pegawaiData' => $pegawaiData, 'title' => $title]);

    }
   // method untuk insert data ke table pegawai
public function store(Request $request)
{
    // Cek apakah id_user_pegawai sudah ada di tabel users
    $existingUser = DB::table('users')
        ->where('id_user_pegawai', $request->pegawai)
        ->first();

    // Jika id_user_pegawai sudah ada, kembalikan respons dengan pesan error
    if ($existingUser) {
         $request->session()->flash('Error', 'Opps, Nama Pegawai Sudah Ada!');
        return redirect('/pengguna');
    }

    // Cek apakah id_user_pegawai sudah ada di tabel users
    $existingUser = DB::table('users')
        ->where('username', $request->username)
        ->first();

    // Jika id_user_pegawai sudah ada, kembalikan respons dengan pesan error
    if ($existingUser) {
         $request->session()->flash('ErrorPengguna', 'Opps, Username Sudah Ada!');
        return redirect('/pengguna');
    }

    // Jika id_user_pegawai belum ada, lanjutkan penyisipan data
    DB::table('users')->insert([
        'id_user_pegawai' => $request->pegawai,
        'username' => $request->username,
        'password' => bcrypt($request->password),
        'level' => $request->level,
        'aktif' => $request->status,
        'created_at' => $request->created_at,
    ]);

    // Set session success message
    $request->session()->flash('Tambah', 'Data berhasil disimpan!');

    // Alihkan halaman ke halaman pengguna
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
