<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class OrcamentoRequest extends FormRequest
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
            'valor' => 'required',
            'estado' => 'required',
            'servico_id' => 'required',
            'cliente_id' => 'required',
        ];
    }

    public function messages(): array
    {
        return[
            'cliente_id.required' => 'Campo cliente é obrigatório!',
            'servico_id.required' => 'Campo serviço é obrigatório!',
        ];
    }
}
