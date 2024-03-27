<?php

namespace App\Http\Request;

use Illuminate\Foundation\Http\FormRequest;

class ValidacionFamilia extends FormRequest
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
            'CodigoFamilia' => 'required|integer',
            'DescripcionFamilia' => 'required|max:200',
        ];
    }

    public function messages()
    {
        return [
            'DescripcionFamilia.max' => 'La descripción no puede tener más de 200 caracteres.',
        ];
    }
}