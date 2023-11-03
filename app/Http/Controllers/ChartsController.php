<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ChartsController extends Controller
{
    public function charts() {
        $title = "Charts";
        return view('charts.index', compact('title'));
    }
}
