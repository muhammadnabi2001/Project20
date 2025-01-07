<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class NewsUpdateRequest extends FormRequest
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
            "titleupdateeng" => "required|max:255|string",
            "titleupdateuz" => "required|max:255|string",
            "titleupdateru" => "required|max:255|string",
            "descriptionupdateeng" => "required|max:255|string",
            "descriptionupdateuz" => "required|max:255|string",
            "descriptionupdateru" => "required|max:255|string",
            'category_id'=>'required|exists:categories,id'
        ];
    }
}
