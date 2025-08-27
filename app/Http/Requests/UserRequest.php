<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;
class UserRequest extends FormRequest
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
        $userId = $this->route('user');
        return [
              'name' => 'required|string|max:255',
            'email' => ['required',
            'email',
            Rule::unique('users')->ignore($userId), // correto!
        ],
            'telefone' => 'required|string|max:20',
            'bi_passaporte' => 'required|string|max:50',
            'endereco' => 'required|string|max:255',
            'password' => 'required|string|min:6|confirmed',
            'role' => 'required|in:agente,motoqueiro',
'status' => 'required|in:ativo,inativo',

        ];
    }
     public function messages()
    {
        return [
            'name.required' => 'O nome é obrigatório.',
            'email.required' => 'O email é obrigatório.',
            'email.email' => 'Informe um email válido.',
            'email.unique' => 'Este email já está em uso.',
            'telefone.required' => 'O telefone é obrigatório.',
            'bi_passaporte.required' => 'O BI ou passaporte é obrigatório.',
            'endereco.required' => 'O endereço é obrigatório.',
            'password.required' => 'A senha é obrigatória.',
            'password.confirmed' => 'A confirmação da senha não corresponde.',
            'role.in' => 'Função inválida. Escolha entre agente ou motoqueiro.',
            'status.in' => 'Status inválido. Escolha entre ativo ou inativo.',
        ];
    }

}
