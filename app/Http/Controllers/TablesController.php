<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TablesController extends Controller
{
    public function tables() {
        $title = "Tables";
        return view('tables.index', compact('title'));
    }
}
