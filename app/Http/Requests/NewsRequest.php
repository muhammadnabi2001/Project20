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
            'title.uz' => 'required|string|max:255',
            'title.ru' => 'required|string|max:255',
            'title.eng' => 'required|string|max:255',

            'description.uz' => 'required|string',
            'description.ru' => 'required|string',
            'description.eng' => 'required|string',

            'category_id' => 'required|exists:categories,id',
        ];
    }
    public function messages()
    {
        return [
            'title.uz.required' => 'O\'zbekcha sarlavha majburiy',
            'title.ru.required' => 'Ruscha sarlavha majburiy',
            'title.eng.required' => 'Inglizcha sarlavha majburiy',
            'description.uz.required' => 'O\'zbekcha ta\'rif majburiy',
            'description.ru.required' => 'Ruscha ta\'rif majburiy',
            'description.eng.required' => 'Inglizcha ta\'rif majburiy',
            'category_id.required' => 'Kategoriya tanlanishi shart',
            'category_id.exists' => 'Berilgan kategoriya mavjud emas',
        ];
    }
}
