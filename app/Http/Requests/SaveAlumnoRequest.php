<?php

namespace App\Http\Requests;

use Carbon\Carbon;
use Illuminate\Foundation\Http\FormRequest;

class SaveAlumnoRequest extends FormRequest
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
            'alu_nom' => 'required',
            'alu_app' => 'required',
            'alu_apm' => 'required',
            'alu_fnac' => 'required|date_format:Y-m-d',
            'alu_tipo_doc' => 'required',
            'alu_nmr_doc' => 'required|max:8',
            'alu_pais' => 'required',
            'alu_departamento' => 'required',
            'alu_provincia' => 'required',
            'alu_distrito' => 'required',            
            'alu_sexo' => 'required',            
            'alu_nom_madre' => 'required',
            'alu_app_madre' => 'required',
            'alu_apm_madre' => 'required',
            'alu_tipo_doc_madre' => 'required',
            'alu_dni_madre' => 'required|max:8',
            'alu_civil_madre' => 'required',            
            'alu_nom_padre' => 'required',
            'alu_app_padre' => 'required',
            'alu_apm_padre' => 'required',
            'alu_tipo_doc_padre' => 'required',
            'alu_dni_padre' => 'required|max:8',            
            'alu_civil_padre' => 'required',
            'apoderado_id' => 'required'
        ];
    }
    
    protected function prepareForValidation()
    {
        $this->merge([
            'alu_fnac' => $this->formatFecha($this->alu_fnac),
        ]);
    }

    protected function formatFecha($alu_fnac)
    {
        try {            
            return Carbon::parse($alu_fnac)->format('Y-m-d');
        } catch (\Exception $e) {
            return null; 
        }
    }
}
