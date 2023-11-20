<?php

namespace App\Http\Controllers;

use App\table;
use App\Pasiens;
use Illuminate\Http\Request;

class TablesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $title = "Tables";
        $data = Pasiens::all();
        return view('tables.index', ['data' => $data], compact('title'));  
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $title = "Create Table Pasien";
        return view('tables.create', compact('title'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'nama_pasien' => 'required',
            'jenis_kelamin' => 'required',
            'tempat_lahir' => 'required',
            'date' => 'required',
            'alamat' => 'required'
        ]);

        $dataBaru = new Pasiens;

        $dataBaru->nama_pasien = $request->input('nama_pasien');
        $dataBaru->jenis_kelamin = $request->input('jenis_kelamin');
        $dataBaru->tempat_lahir = $request->input('tempat_lahir');
        $dataBaru->date = $request->input('date');
        $dataBaru->alamat = $request->input('alamat');

        $dataBaru->save();

        $request->session()->flash('Tambah', 'Data Berhasil Disimpan!');

        return redirect('tables.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\table  $table
     * @return \Illuminate\Http\Response
     */
    public function show(table $table)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\table  $table
     * @return \Illuminate\Http\Response
     */
    public function edit(table $table)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\table  $table
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, table $table)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\table  $table
     * @return \Illuminate\Http\Response
     */
    public function destroy(table $table)
    {
        //
    }
}
