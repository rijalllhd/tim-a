<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function dashboard()
    {
        $title = 'Dashboard'; // Data tambahan yang ingin Anda kirim ke tampilan
<<<<<<< HEAD

=======
>>>>>>> 7772d8902c48b2bf1a95e0ef07aa32bf2d2a8685
        return view('dashboard.index', compact('title'));
    }

    public function dashboardadmin()
    {
        return view('dashboard.admin');
    }
}


