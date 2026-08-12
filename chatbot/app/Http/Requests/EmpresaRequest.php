<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;
use Override;

class EmpresaRequest extends FormRequest
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
            'nome'  => ['required'],
            'email' => ['required', 'email']
        ];
    }

    #[Override]
    public function messages()
    {
        return [
            'nome.required'  => 'Campo Nome é obrigatório',
            'email.required' => 'Campo E-mail é obrigatório',
            'email.email'    => 'Campo E-mail deve conter um e-mail válido',
        ];
    }
}
