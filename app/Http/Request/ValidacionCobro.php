<?php

namespace App\Http\Request;

use Illuminate\Foundation\Http\FormRequest;

class ValidacionCobro extends FormRequest
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
            'CodigoCobro' => 'required|integer',
            'DescripcionCobro' => 'required|max:200',
        ];
    }

    public function messages()
    {
        return [
            'DescripcionCobro.max' => 'La descripción no puede tener más de 200 caracteres.',
        ];
    }
}