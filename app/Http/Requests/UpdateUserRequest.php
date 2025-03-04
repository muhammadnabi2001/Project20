<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateUserRequest extends FormRequest
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
            'name' => 'required|string|max:255',
            'email' => 'required|email',
            'password' => 'required|min:8',
        ];
    }
    public function messages(): array
    {
        return [
            'name.required' => 'Ismingizni kiriting.',
            'email.required' => 'Elektron pochta manzilingizni kiriting.',
            'email.unique' => 'Bu elektron pochta manzili allaqachon ishlatilgan.',
            'password.min' => 'Parol kamida 8 ta belgidan iborat bo‘lishi kerak.',
            'password.required' => 'Parol kiritilmagan',
        ];
    }
}
