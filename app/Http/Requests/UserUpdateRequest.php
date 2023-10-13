<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserUpdateRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true; 
    }

    public function rules(): array
    {
        return [
            'name' => 'sometimes|required|string|max:255',
            'email' => 'sometimes|required|string|email|max:255|unique:users',
            'password' => 'sometimes|string|min:8',
            'birth' => 'sometimes|required|date|before_or_equal:' . now()->subYears(18)->format('Y-m-d'),
            'username' => 'sometimes|required|string|max:255|unique:users',
            'img_cover' => 'sometimes|image|mimes:jpeg,png,jpg,gif|max:2048',
            'img_user' => 'sometimes|image|mimes:jpeg,png,jpg,gif|max:2048', 
            'bio' => 'nullable|string|max:255',
            'artist' => 'sometimes|boolean',
        ];
    }
}
