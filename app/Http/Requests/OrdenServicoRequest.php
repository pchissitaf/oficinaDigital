<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class OrdenServicoRequest extends FormRequest
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
            'valor_total' => 'required',
            'observacao'=>'required',
            'estado' => 'required',
            'orcamento_id' => 'required',
            'funcionario_id' => 'required',
        ];
    }

    public function messages(): array
    {
        return[
            'orcamento_id.required' => 'Campo Id do Orcamento é obrigatório!',
            'funcionario_id.required' => 'Campo funcionario é obrigatório!',
        ];
    }
}
