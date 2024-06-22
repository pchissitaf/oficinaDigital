<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CarroRequest extends FormRequest
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
            'modelo' => 'required',
            'cor' => 'required',
            'marca' => 'required',
            'tipo' => 'required',
            'estado_carro_id' => 'required',
            'marca' => 'required',
            'ano' => 'required',
            'avaria' => 'required',
            'cliente_id' => 'required',
            'funcionario_id' => 'required',
            'estado_carro_id' => 'required',
        ];
    }

    public function messages(): array
    {
        return[
            'cliente_id.required' => 'Campo Proprietario é obrigatório!',
            'funcionario_id.required' => 'Campo Funcionario é obrigatório!',
            'estado_carro_id.required' => 'Campo estado do carro é obrigatório!',
        ];
    }
}
