<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SaveProfesorRequest extends FormRequest
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
            'pro_nom' => 'required',
            'pro_app' => 'required',
            'pro_apm' => 'required',
            'pro_dire' => 'nullable',
            'pro_telf' => 'required',
            'pro_correo' => 'required',
            'pro_sexo' => 'nullable',
            'pro_dni' => 'max:8',
            'pro_grado_instruccion' => 'required',
            'pro_especialidad' => 'nullable',
            'pro_pais' => 'nullable',
            'pro_fnac' => 'nullable',
            'pro_distrito' => 'required',
            'pro_estado' => 'required'
        ];
    }
}
