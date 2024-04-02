<?php

namespace App\Http\Request;

use Illuminate\Foundation\Http\FormRequest;

class ValidacionVenta extends FormRequest
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
            'UserId' => 'required', 
            'ArticuloId' => 'required', 
            'Precio' => 'required',
            'Unidades' => 'required',
        ];
    }

    public function messages()
    {
        return [
            'UserId.required' => 'El cliente es requerido.', 
            'ArticuloId.required' => 'El artículo es requerido.', 
            'Precio.required' => 'El precio es requerido.',
            'Unidades.required' => 'Las unidades son requeridas.',
        ];
    }
}