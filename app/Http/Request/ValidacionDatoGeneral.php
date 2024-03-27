<?php

namespace App\Http\Request;

use Illuminate\Foundation\Http\FormRequest;

class ValidacionDatoGeneral extends FormRequest
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
            /*'TiempoReserva' => 'required|time',
            'HoraInicio' => 'required|time',
            'HoraFin' => 'required|time',*/
        ];
    }

    public function messages()
    {
        return [
            /*'TiempoReserva.requied' => 'Debe especificar el tiempo de reserva de una pista de pádel.',
            'HoraInicio.requied' => 'Debe especificar la hora de inicio de las reservas.',
            'HoraFin.requied' => 'Debe especificar la hora fin de las reservas.',*/
        ];
    }
}