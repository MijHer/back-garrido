<?php

namespace App\Http\Requests;

use Carbon\Carbon;
use Illuminate\Foundation\Http\FormRequest;

class SavePagoRequest extends FormRequest
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
            'pago_fecha' => 'required',
            'pago_hora' => 'required',
            'pago_monto' => 'required',
            'pago_concepto' => 'required',
            'pago_periodo' => 'required',
            'matricula_id' => 'required',
            'alumno_id' => 'required'
        ];
    }
}
