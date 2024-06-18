<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ServicoRequest extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'nome' => 'required',
            'valor' => 'required|max:10',
        ];
    }

    public function messages(): array
    {
        return[
            'nome.required' => 'Campo nome é obrigatório!',
            'valor.required' => 'Campo valor é obrigatório!',
            'valor.max' => 'O preço só pode ter no máximo 8 números!',
        ];
    }
}
