<?php

namespace App\Http\Controllers;

use App\Http\Requests\CategoryRequest;
use App\Http\Requests\CategoryStoreRequest;
use App\Http\Requests\CategoryUpdateRequest;
use App\Http\Resources\CategoryResource;
use App\Models\Category;
use Illuminate\Http\Request;

class CategorybladeController extends Controller
{
    public function index()
    {
        $categories=Category::orderBy('id','desc')->paginate(10);
        return view('Categorya.index',['categories'=>$categories]);
    }
    public function store(CategoryStoreRequest $request)
    {
       //dd( $request->all());
        $validated = $request->validated();

        $category = Category::create([
            'name' => json_encode([
                'uz' => $validated['uz'],
                'ru' => $validated['ru'],
                'eng' => $validated['eng'],
            ], true)
        ]);
       // return new CategoryResource($category);
       return back();
    }
    public function update(CategoryUpdateRequest $request,Category $category)
    {
        $validated = $request->validated();

        $category->update([
            'name' => json_encode([
                'uz' => $validated['uzupdate'],
                'ru' => $validated['ruupdate'],
                'eng' => $validated['engupdate'],
            ], true),
        ]);
        return back();
    }
    public function delete(Category $category)
    {
        //dd($category);
        $category->delete();
        return back();
    }
}
