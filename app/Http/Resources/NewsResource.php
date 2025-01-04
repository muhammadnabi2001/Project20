<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class NewsResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'title' => [
                'uz' => $this->title['uz'] ?? null,
                'ru' => $this->title['ru'] ?? null,
                'eng' => $this->title['eng'] ?? null,
            ],
            'description' => [
                'uz' => $this->description['uz'] ?? null,
                'ru' => $this->description['ru'] ?? null,
                'eng' => $this->description['eng'] ?? null,
            ],
            'category_id' => $this->category_id,
            'created_at' => $this->created_at->format('Y-m-d H:i:s'),
            'updated_at' => $this->updated_at->format('Y-m-d H:i:s'),
        ];
    }
}
