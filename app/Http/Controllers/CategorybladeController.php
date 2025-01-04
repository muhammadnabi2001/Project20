<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategorybladeController extends Controller
{
    public function index()
    {
        $categories=Category::all();
        return view('Categorya.index',['categories'=>$categories]);
    }
}
