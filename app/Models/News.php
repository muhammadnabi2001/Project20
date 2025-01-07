<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class News extends Model
{
    protected $fillable=[
        'title',
        'description',
        'category_id'
    ];
    protected $casts=[
        'title'=>'array',
        'description'=>'array'
    ];
    public function category()
    {
        return $this->belongsTo(Category::class,'category_id');
    }
}
