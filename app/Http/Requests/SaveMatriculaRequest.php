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
            'mat_fecha' => 'required|date',
            'mat_hora' => 'required',
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
        ]);
    }

    protected function formatFecha($mat_fecha)
    {
        return Carbon::createFromFormat('d/m/Y', $mat_fecha)->format('Y-m-d');
    }
}
