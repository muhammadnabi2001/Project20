<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CategoryRequest extends FormRequest
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
            'uz'=>'required|max:255|string',
            'ru'=>'required|max:255|string',
            'eng'=>'required|max:255|string'
        ];
    }
    public function messages(): array
    {
        return [
            'uz.required' => 'O\'zbekcha nomi talab qilinadi.',
            'uz.max' => 'O\'zbekcha nomi 255 ta belgidan oshmasligi kerak.',
            'uz.string' => 'O\'zbekcha nomi faqat matn bo\'lishi kerak.',
            'ru.required' => 'Ruscha nomi talab qilinadi.',
            'ru.max' => 'Ruscha nomi 255 ta belgidan oshmasligi kerak.',
            'ru.string' => 'Ruscha nomi faqat matn bo\'lishi kerak.',
            'eng.required' => 'Inglizcha nomi talab qilinadi.',
            'eng.max' => 'Inglizcha nomi 255 ta belgidan oshmasligi kerak.',
            'eng.string' => 'Inglizcha nomi faqat matn bo\'lishi kerak.',
        ];
    }
}
