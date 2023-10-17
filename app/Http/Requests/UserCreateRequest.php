<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserCreateRequest extends FormRequest
{

    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8',
            'birth' => 'required|date|before_or_equal:' . now()->subYears(18)->format('Y-m-d'),
            'username' => 'required|string|max:255|unique:users',
        ];
    }
}
