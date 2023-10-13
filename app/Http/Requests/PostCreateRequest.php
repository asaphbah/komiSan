<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PostCreateRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'title' => 'required|string|max:255',
            'comentario' => 'required|string|max:1000',
            'img_post' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048', 
        ];
    }
}
