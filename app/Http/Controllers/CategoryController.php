<?php

namespace App\Http\Controllers;

use App\Http\Requests\CategoryRequest;
use App\Http\Resources\CategoryResource;
use App\Models\Category;
use App\Models\News;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function create(CategoryRequest $request)
    {
        $validated = $request->validated();

        $category = Category::create([
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
    public function update(CategoryRequest $request, $id)
    {
        $validated = $request->validated();

        $category = Category::findOrFail($id);

        $category->update([
            'name' => json_encode([
                'uz' => $validated['uz'],
                'ru' => $validated['ru'],
                'eng' => $validated['eng'],
            ], true),
        ]);
        return new CategoryResource($category);
    }
    public function delete($id)
    {
        $category=Category::findOrFail($id);
        $category->delete();
      
        return response()->json(['success'=>'Category deleted successfully']);
    }
    
    
}
