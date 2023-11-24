<?php

namespace App\Http\Controllers;

use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Pegawai;

class LoginController extends Controller
{
    public function index () {
        return view('login.index');
    }

    public function authenticate (Request $request) {
        $credentials = $request->only('username','password');

        if (Auth::attempt($credentials)) {

            if (Pegawai::where('id',auth()->user()->id_user_pegawai)->first()) {
                if (auth()->user()->level == '1') {
                session()->regenerate();
                return redirect()->intended('/dashboard');
                } else {
                session()->regenerate();
                return redirect()->intended('/dashboardadmin');
                }
            } 
            return back()->with('loginError', 'User Tidak Valid');
        }
        return back()->with('loginError', 'Username atau Password Tidak Valid');
    }



    public function logout (Request $request) {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/');
    }
}