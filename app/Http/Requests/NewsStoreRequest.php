<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class NewsStoreRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            "titleeng" => "required|max:255|string",
            "titleuz" => "required|max:255|string",
            "titleru" => "required|max:255|string",
            "descriptioneng" => "required|max:255|string",
            "descriptionuz" => "required|max:255|string",
            "descriptionru" => "required|max:255|string",
            'category_id'=>'required|exists:categories,id'
        ];
    }
}
