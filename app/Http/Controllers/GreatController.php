<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class GreatController extends Controller
{
    public function index()
    {
        return view('Great.index');
    }
}
