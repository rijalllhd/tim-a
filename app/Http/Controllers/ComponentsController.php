<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ComponentsController extends Controller
{
    public function buttons ()
    {
        $title = "Buttons";
        return view('components.buttons', compact('title'));
    }

    public function cards ()
    {
        $title = "Components";
        return view('components.cards', compact('title'));
    }
}
