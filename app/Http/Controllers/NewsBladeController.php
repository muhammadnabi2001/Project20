<?php

namespace App\Http\Controllers;

use App\Http\Requests\NewsStoreRequest;
use App\Http\Requests\NewsUpdateRequest;
use App\Models\Category;
use App\Models\News;
use Illuminate\Http\Request;

class NewsBladeController extends Controller
{
    public function index()
    {
        $news=News::orderBy('id','desc')->paginate(10);
        $categories=Category::all();
        return view('News.news',['news'=>$news,'categories'=>$categories]);
    }
    public function store(NewsStoreRequest $request)
    {
        // dd($request->all());
        $validated = $request->validated();
        $news = News::create([
            'title' => [
                'uz' => $validated['titleuz'],
                'ru' => $validated['titleru'],
                'eng' => $validated['titleeng'],
            ],
            'description' => [
                'uz' => $validated['descriptionuz'],
                'ru' => $validated['descriptionru'],
                'eng' => $validated['descriptioneng'],
            ],
            'category_id' => $validated['category_id'],
        ]);
        return back();
    }
    public function update(NewsUpdateRequest $request,News $new)
    {
      // dd($request->all());
        $validated = $request->validated();
        $new->update([
            'title' => [
                'uz' => $validated['titleupdateuz'],
                'ru' => $validated['titleupdateru'],
                'eng' => $validated['titleupdateeng'],
            ],
            'description' => [
                'uz' => $validated['descriptionupdateuz'],
                'ru' => $validated['descriptionupdateru'],
                'eng' => $validated['descriptionupdateeng'],
            ],
            'category_id' => $validated['category_id'],
        ]);
        return back();
    }
}
