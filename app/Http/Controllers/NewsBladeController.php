<?php

namespace App\Http\Controllers;

use App\Models\News;
use Illuminate\Http\Request;

class NewsBladeController extends Controller
{
    public function index()
    {
        $news=News::orderBy('id','desc')->paginate(10);
        return view('News.news',['news'=>$news]);
    }
}
