<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;
use Override;

class UsuarioRequest extends FormRequest
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
     * @return array<string, ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'empresa'  => ['required'],
            'name'     => ['required'],
            'email'    => ['required', 'email', 'unique:users'],
            'password' => ['required', 'min:8', 'confirmed'],
        ];
    }

    #[Override]
    public function messages()
    {
        return [
            'empresa.required'   => 'Campo Empresa é obrigatório',
            'name.required'      => 'Campo Nome é obrigatório',
            'email.required'     => 'Campo E-mail é obrigatório',
            'email.email'        => 'Campo E-mail deve conter um e-mail válido',
            'email.unique'       => 'Este e-mail já foi usado, informe outro',
            'password.required'  => 'Campo Senha é obrigatório',
            'password.min'       => 'Campo Senha deve conter no mínimo :min caracteres',
            'password.confirmed' => 'Campo Senha e Confirmar Senha não batem',
        ];
    }
}
