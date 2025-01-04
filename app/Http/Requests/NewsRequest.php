<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class NewsRequest extends FormRequest
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
            'title_uz' => 'required|string|max:255',
            'title_ru' => 'required|string|max:255',
            'title_eng' => 'required|string|max:255',

            'description_uz' => 'required|string',
            'description_ru' => 'required|string',
            'description_eng' => 'required|string',

            'category_id' => 'required|exists:categories,id',
        ];
    }
    public function messages()
    {
        return [
            'title_uz.required' => 'O\'zbekcha sarlavha majburiy',
            'title_ru.required' => 'Ruscha sarlavha majburiy',
            'title_eng.required' => 'Inglizcha sarlavha majburiy',
            'description_uz.required' => 'O\'zbekcha ta\'rif majburiy',
            'description_ru.required' => 'Ruscha ta\'rif majburiy',
            'description_eng.required' => 'Inglizcha ta\'rif majburiy',
            'category_id.required' => 'Kategoriya tanlanishi shart',
            'category_id.exists' => 'Berilgan kategoriya mavjud emas',
        ];
    }
}
