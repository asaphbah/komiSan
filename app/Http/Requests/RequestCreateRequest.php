<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RequestCreateRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        // Defina a autorização conforme necessário, por exemplo, se o usuário estiver autenticado
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            'title' => 'required|string|max:255',
            'description' => 'required|string|max:1000',
            'total_value' => 'required|numeric|min:0',
            'deadline' => 'required|date|after:today', 
            'reference_img' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048', 
            'user_id' => 'required|exists:users,id', 
            'artist_id' => 'required|exists:users,id', 
        ];
    }
}
