<?php

namespace App\Http\Request;

use Illuminate\Foundation\Http\FormRequest;

class ValidacionReserva extends FormRequest
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
            'CodigoReserva' => 'required|integer',
            'DescripcionReserva' => 'required|max:100',
        ];
    }

    public function messages()
    {
        return [
            'DescripcionReserva.max' => 'La descripción no puede tener más de 100 caracteres.',
        ];
    }
}