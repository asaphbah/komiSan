<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserCreateUpdateRequest extends FormRequest
{

    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|string|min:8',
            'birth' => 'required|date|before_or_equal:' . now()->subYears(18)->format('Y-m-d'), // Deve ser maior de idade
            'username' => 'required|string|unique:users,username',
        ];
    }
    public function messages(): array
    {
        return [
            'name.required' => 'O campo Nome é obrigatório.',
            'name.max' => 'O campo Nome não pode ter mais de :max caracteres.',
            'email.required' => 'O campo Email é obrigatório.',
            'email.email' => 'O campo Email deve ser um endereço de email válido.',
            'email.unique' => 'Este email já está em uso.',
            'password.required' => 'O campo Senha é obrigatório.',
            'password.min' => 'O campo Senha deve ter pelo menos :min caracteres.',
            'birth.required' => 'O campo Data de Nascimento é obrigatório.',
            'birth.date' => 'O campo Data de Nascimento deve ser uma data válida.',
            'birth.before_or_equal' => 'Você deve ter pelo menos 18 anos de idade.',
            'username.required' => 'O campo Nome de Usuário é obrigatório.',
            'username.unique' => 'Este Nome de Usuário já está em uso.',
        ];
    }
}
