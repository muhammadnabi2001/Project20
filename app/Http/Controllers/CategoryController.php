<?php

namespace App\Http\Controllers;

use App\Http\Requests\CategoryRequest;
use App\Http\Resources\CategoryResource;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function create(CategoryRequest $request)
    {
        $validated = $request->validated();

        $category=Category::create([
            'name' => json_encode([
                'uz' => $validated['uz'],
                'ru' => $validated['ru'],
                'eng' => $validated['eng'],
            ], true)
        ]);
        return new CategoryResource($category);
    }
    public function all()
    {
        $categories = Category::all();
        return CategoryResource::collection($categories);
    }
}
