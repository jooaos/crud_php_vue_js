<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PessoasRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'nome_usuario' => 'required|string|max:255',
            'email_usuario' => 'required|email|max:255',
            'fk_categoria_id' => 'required|exists:categoria,codigo'
        ];
    }

    public function messages() {
        return [
            'nome_usuario.required' => 'É necessário informar um nome para o usuário.',
            'nome_usuario.string' => 'O nome do usuário precisar ser do formato TEXTO.',
            'nome_usuario.max' => 'O nome do usuário pode conter até 255 caracteres.',
            'email_usuario.required' => 'É necessário informar um e-mail para o usuário.',
            'email_usuario.email' => 'Digite um e-mail válido.',
            'email_usuario.max' => 'O e-mail do usuário pode conter até 255 caracteres.',
            'fk_categoria_id.required' => 'É necessário definir uma posição de hierarquia para o usuário.',
            'fk_categoria_id.exists' => 'A posição hierarquica informada não é aceita.'
        ];
    }
}
