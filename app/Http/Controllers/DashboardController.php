<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function dashboard()
    {
        $title = 'Dashboard'; // Data tambahan yang ingin Anda kirim ke tampilan

        return view('dashboard.index', compact('title'));
    }

    public function dashboardadmin()
    {
        return view('dashboard.admin');
    }
}
