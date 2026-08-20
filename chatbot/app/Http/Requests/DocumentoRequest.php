<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;
use Override;

class DocumentoRequest extends FormRequest
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
            'titulo'   => ['required'],
            'conteudo' => ['required'],
        ];
    }

    #[Override]
    public function messages()
    {
        return [
            'titulo.required'   => 'Campo Título é obrigatório',
            'conteudo.required' => 'Campo Conhecimento é obrigatório',
        ];
    }
}
