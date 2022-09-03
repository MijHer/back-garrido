<?php

namespace App\Http\Requests;

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
            'user_id' => 'nullable',
            'alu_foto' => 'nullable',
            'alu_nom' => 'required',
            'alu_app' => 'required',
            'alu_apm' => 'required',
            'alu_fnac' => 'required',
            'alu_tipo_doc' => 'required',
            'alu_nmr_doc' => 'required|max:8',
            'alu_grado' => 'required',
            'alu_pais' => 'required',
            'alu_departamento' => 'required',
            'alu_provincia' => 'required',
            'alu_distrito' => 'required',
            'alu_cert_discapacidad' => 'required',
            'alu_tipo_discapacidad' => 'required',
            'alu_nmr_hermanos' => 'required',
            'alu_lugar_ocupa' => 'required',
            'alu_sexo' => 'required',
            'alu_lengua_materna' => 'required',
            'alu_tipo_sangre' => 'nullable',
            'alu_religion' => 'nullable',
            'alu_nom_madre' => 'required',
            'alu_app_madre' => 'required',
            'alu_apm_madre' => 'required',
            'alu_tipo_doc_madre' => 'required',
            'alu_dni_madre' => 'required|max:8',
            'alu_civil_madre' => 'required',
            'alu_vive_madre' => 'required',
            'alu_fnca_madre' => 'nullable',
            'alu_vive_con_madre' => 'required',
            'alu_grado_inst_madre' => 'nullable',
            'alu_ocupacion_madre' => 'required',
            'alu_religion_madre' => 'required',
            'alu_nom_padre' => 'required',
            'alu_app_padre' => 'required',
            'alu_apm_padre' => 'required',
            'alu_tipo_doc_padre' => 'required',
            'alu_dni_padre' => 'required|max:8',
            'alu_vive_padre' => 'required',
            'alu_fnca_padre' => 'nullable',
            'alu_vive_con_padre' => 'required',
            'alu_grado_inst_padre' => 'nullable',
            'alu_ocupacion_padre' => 'required',
            'alu_religion_padre' => 'nullable',
            'alu_civil_padre' => 'required',
            'apoderado_id' => 'required'
        ];
    }
}
