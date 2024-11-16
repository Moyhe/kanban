<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreMemeberRequest extends FormRequest
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
            'name' => ['required', 'string'],
            'title' => ['required', 'string'],
            'age' => ['required', 'integer', 'min:0', 'max:100'],
            'email' => ['required', 'email'],
            'mobile_number' => ['required', 'string', 'regex:/^\+?[1-9]\d{1,14}$/']
        ];
    }
}
