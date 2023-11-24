<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Pasiens;

class PasiensTableController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $title = "PasiensTable";
        $data = Pasiens::all();
        return view('tables.pasiens', ['data'=>$data],compact('title'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // insert data ke table pegawai
        Pasiens::insert([
            'nama_pasien' => $request->pasien,
            'jenis_kelamin' => $request->jk,
            'tempat_lahir' => $request->tl,
            'date' => $request->date,
            'telepon' => $request->tlp,
            'alamat' => $request->alamat,
            'created_at' => $request->created_at,

        ]);
        // Set session success message
        $request->session()->flash('Tambah', 'Data berhasil disimpan!');

        // alihkan halaman ke halaman pegawai
        return redirect('/pasienstable');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        // update data pegawais
        Pasiens::where('id_pasien',$request->id_pasien)->update([
            'nama_pasien' => $request->pasien,
            'jenis_kelamin' => $request->jk,
            'tempat_lahir' => $request->tl,
            'date' => $request->date,
            'telepon' => $request->tlp,
            'alamat' => $request->alamat,
            'updated_at' => $request->updated_at,
        ]);
        // Set session success message
        $request->session()->flash('Ubah', 'Data berhasil diubah!');
        // alihkan halaman ke halaman pegawai
        return redirect('pasienstable');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        // Menghapus data pegawai berdasarkan id yang dipilih
        Pasiens::where('id_pasien', $id)->delete();

        // Set session success message
        request()->session()->flash('Hapus', 'Data berhasil dihapus!');

        // Alihkan halaman ke halaman pengguna
        return redirect('pasienstable');
    }
}
