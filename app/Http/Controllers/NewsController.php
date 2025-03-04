<?php

namespace App\Http\Controllers;

use App\Http\Requests\NewsRequest;
use App\Http\Resources\NewsResource;
use App\Models\Category;
use App\Models\News;
use Illuminate\Http\Request;

class NewsController extends Controller
{
    public function index()
    {
        $news = News::all();
        return NewsResource::collection($news);
    }
    public function store(NewsRequest $request)
    {
        // return $request->all();
        $validated = $request->validated();
        $news = News::create([
            'title' => [
                'uz' => $validated['title_uz'],
                'ru' => $validated['title_ru'],
                'eng' => $validated['title_eng'],
            ],
            'description' => [
                'uz' => $validated['description_uz'],
                'ru' => $validated['description_ru'],
                'eng' => $validated['description_eng'],
            ],
            'category_id' => $validated['category_id'],
        ]);

        return new NewsResource($news);
    }
    public function update(NewsRequest $request, $id)
    {
        $validated = $request->validated();
        $news=News::FindOrFail($id);
        $news->update([
            'title' => [
                'uz' => $validated['title_uz'],
                'ru' => $validated['title_ru'],
                'eng' => $validated['title_eng'],
            ],
            'description' => [
                'uz' => $validated['description_uz'],
                'ru' => $validated['description_ru'],
                'eng' => $validated['description_eng'],
            ],
            'category_id' => $validated['category_id'],
        ]);

        return new NewsResource($news);
    }
    public function delete($id)
    {
        $new=News::findOrFail($id);
        $new->delete();
        return response()->json(['success'=>'News deleted successfully']);
    }
    public function news()
    {
        $news = News::orderBy('id', 'desc')->paginate(10);
        $categories=Category::all();
        return view('index',['news'=>$news,'categories'=>$categories]);
    }
    public function choose(Category $category)
    {
        //dd($category);
        $news = News::orderBy('id', 'desc')->where('category_id',$category->id)->paginate(10);
        $categories=Category::all();
        return view('index',['news'=>$news,'categories'=>$categories]);
    }
}
