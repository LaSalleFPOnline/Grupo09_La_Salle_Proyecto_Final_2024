<?php

namespace App\Http\Request;

use Illuminate\Foundation\Http\FormRequest;

class ValidacionPista extends FormRequest
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
            'CodigoPista' => 'required|integer',
            'DescripcionPista' => 'required|max:100',
        ];
    }

    public function messages()
    {
        return [
            'DescripcionPista.max' => 'La descripción no puede tener más de 100 caracteres.',
        ];
    }
}