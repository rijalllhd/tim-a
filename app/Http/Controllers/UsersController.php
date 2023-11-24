<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\User;
use App\Pegawai;

class UsersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::all();
        return view('crud_users.index', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $pegawai = Pegawai::all();
        return view('crud_users.create', compact('pegawai'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // dd($request->all());
        $request->validate([
            'id_user_pegawai' => 'required|numeric',
            'username' => 'required',
            'password' => 'required',
        ]);

        $users = [
            'id_user_pegawai'=>$request->id_user_pegawai,
            'username'=>$request->username,
            'password'=>Hash::make($request->password),
        ];

        User::create($users);
        return redirect()->to('users');


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
        $pegawai = Pegawai::all();
        $users = User::where('id', $id)->first();
        return view('crud_users.edit', compact('users', 'pegawai'));
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
        $request->validate([
            'id_user_pegawai' => 'required|numeric',
            'username' => 'required',
            'password' => 'required',
        ]);

        $users = [
            'id_user_pegawai'=>$request->id_user_pegawai,
            'username'=>$request->username,
            'password'=>Hash::make($request->password),
        ];
        
        User::where('id', $id)->update($users);
        return redirect()->to('users');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        User::where('id', $id)->delete();
        return redirect()->to('users');
    }
}
