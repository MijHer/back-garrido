<?php

namespace App\Http\Requests;

use Carbon\Carbon;
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
            'mat_cod_modular' => 'nullable|max:7',
            'mat_fecha' => 'required|date_format:Y-m-d',
            'mat_hora' => 'required|date_format:H:i:s',
            'mat_costo' => 'required',
            'mat_nivel' => 'required',
            'mat_repit' => 'nullable',
            'mat_estado' => 'required',           
            'grado_id' => 'required',
            'distrito_id' => 'required',
            'anioacademico_id' => 'required',
            'alumno_id' => 'required',
            'apoderado_id' => 'required'
        ];
    }

    protected function prepareForValidation()
    {
        $this->merge([
            'mat_fecha' => $this->formatFecha($this->mat_fecha),
            //'mat_hora' => $this->formatHora($this->mat_hora)
        ]);
    }

    protected function formatFecha($mat_fecha)
    {
        try {
            return Carbon::parse($mat_fecha)->format('Y-m-d');
        } catch (\Exception $e) {
            return null;
        }
    }

    //PARA FORMATEAR LA HORA RECIBIDA DE LA HORA LOCAL
    /*protected function formatHora($mat_hora)
    {
        try {
            return Carbon::parse($mat_hora)->format('H:i:s');
        } catch (\Exception $e) {
            return $e;
        }
    }*/
}