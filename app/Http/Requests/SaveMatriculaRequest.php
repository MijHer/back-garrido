<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SaveMatriculaRequest extends FormRequest
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
            'mat_cod_modualar' => 'nullable',
            'mat_fecha' => 'required',
            'mat_costo' => 'required',
            'mat_nivel' => 'required',
            'mat_turno' => 'required',
            'mat_sec' => 'nullable',
            'mat_foto' => 'nullable',
            'apo_nom' => 'required',
            'apo_app' => 'required',
            'apo_apm' => 'required',
            'apo_parenteso' => 'required',
            'apo_telf' => 'nullable',
            'apo_dni' => 'required|max:8',
            'pago_id' => 'required',
            'grado_id' => 'required',
            'distrito_id' => 'required',
            'anioacademico_id' => 'required',
            'alumno_id' => 'required'
        ];
    }
}
