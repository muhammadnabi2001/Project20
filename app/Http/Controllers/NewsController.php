<?php

namespace App\Http\Controllers;

use App\Http\Requests\NewsRequest;
use App\Http\Resources\NewsResource;
use App\Models\News;
use Illuminate\Http\Request;

class NewsController extends Controller
{
    public function index()
    {
        $news=News::all();
        return NewsResource::collection($news);
    }
    public function store(NewsRequest $request)
    {
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
}
