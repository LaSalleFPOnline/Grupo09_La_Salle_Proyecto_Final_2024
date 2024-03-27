<?php

namespace App\Http\Request;

use Illuminate\Foundation\Http\FormRequest;

class ValidacionUsuario extends FormRequest
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
            'CodigoUsuario' => 'required|integer',
            'DescripcionUsuario' => 'required|max:100',
        ];
    }

    public function messages()
    {
        return [
            'DescripcionUsuario.max' => 'La descripción no puede tener más de 100 caracteres.',
        ];
    }
}