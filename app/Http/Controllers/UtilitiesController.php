<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UtilitiesController extends Controller
{
    public function utilitiescolor() {
        return view('utilities.color');
    }

    public function utilitiesborder() {
        return view('utilities.border');
    }

    public function utilitiesother() {
        return view('utilities.other');
    }

    public function utilitiesanimation() {
        return view('utilities.animation');
    }
}
