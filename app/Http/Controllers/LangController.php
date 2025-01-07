<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;

class LangController extends Controller
{
    public function index($lang)
    {
        session()->put('lang', $lang);
       // dd(session('lang'));
    //dd(App::getLocale());

        return redirect()->back();
    }
}
