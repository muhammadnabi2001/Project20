<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;

class LangController extends Controller
{
    public function index($lang)
    {
       // dd($lang);
        if(!in_array($lang,['uz','ru','eng']))
        {
            abort(404);
        }
        App::setLocale($lang);
        session()->put('lang',$lang);
        //dd(session('lang'));
        return back();
    }
}
