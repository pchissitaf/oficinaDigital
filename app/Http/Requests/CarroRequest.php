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
            'user_id' => 'required',
            'funcionario_id' => 'required',
            'estado_carro_id' => 'required',
        ];
    }

    public function messages(): array
    {
        return[
            'modelo.required' => 'Campo modelo é obrigatório!',
            'cor.required' => 'Campo cor é obrigatório!',
            'marca.required' => 'Campo marca é obrigatório!',
            'tipo.required' => 'Campo tipo é obrigatório!',
            'estado_carro_id.required' => 'Campo estado do carro é obrigatório!',
            'ano.required' => 'Campo ano é obrigatório!',
            'estado_carro_id.required' => 'Campo situação da conta é obrigatório!',
        ];
    }
}
