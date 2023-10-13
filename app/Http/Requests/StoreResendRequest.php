<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreResendRequest extends FormRequest
{

    public function authorize(): bool
    {
        return true; 
    }
    public function rules(): array
    {
        return [
            'resend' => 'required|string|max:255', 
            'request_id' => 'required|exists:request_artists,id', 
        ];
    }
}