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
            'CobroId' => 'required',
            'VentaId' => 'required',
            'Importe' => 'required',
        ];
    }

    public function messages()
    {
        return [
            'CobroId.required' => 'La Id del cobro es requerida',
            'VentaId.required' => 'La Id del cobro es requerida',
            'Importe.required' => 'El importe es requirido',
        ];
    }
}