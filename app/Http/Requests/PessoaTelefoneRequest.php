<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PessoaTelefoneRequest extends FormRequest
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
            'pessoa' => 'required',
            'tipo' => 'required',
            'numero' => 'required'
        ];
    }

    public function messages()
    {
        return [
            'pessoa' => 'Informação obrigatória.',
            'pesstipooa' => 'Informação obrigatória.',
            'numero' => 'Informação obrigatória.',
        ];
    }
}
