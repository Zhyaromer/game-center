<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateUserValidation extends FormRequest
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
            'name' => 'required|string|max:255|min:3',
            'email' => [
                'required',
                'string',
                'email',
                'max:255',
                'min:5',
                Rule::unique('users', 'email')->ignore($this->route('user'), 'user_id'),
            ],
            'password' => 'nullable|string|min:6|max:255',
            'role' => 'required|string|in:user,admin,chef',
        ];
    }
}
