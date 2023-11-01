<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ComponentsController extends Controller
{
    public function buttons () 
    { 
        return view('components.buttons');
    }

    public function cards ()
    {
        return view('components.cards');
    }
}
