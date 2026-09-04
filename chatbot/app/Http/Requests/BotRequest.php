<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;
use Override;

class BotRequest extends FormRequest
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
            'nome'   => ['required'],
            'domain' => ['required'],
        ];
    }

    #[Override]
    public function messages()
    {
        return [
            'nome.required'   => 'Campo Nome do bot é obrigatório',
            'domain.required' => 'Campo Domínio é obrigatório',
        ];
    }
}
