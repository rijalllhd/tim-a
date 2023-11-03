<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UtilitiesController extends Controller
{
    public function utilitiescolor() {
        $title = "Utilities";
        return view('utilities.color', compact('title'));
    }

    public function utilitiesborder() {
        $title = "Border";
        return view('utilities.border', compact('title'));
    }

    public function utilitiesother() {
        $title = "Other";
        return view('utilities.other', compact('title'));
    }

    public function utilitiesanimation() {
        $title = "Animation";
        return view('utilities.animation', compact('title'));
    }
}
