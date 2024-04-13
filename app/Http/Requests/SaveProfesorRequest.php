<?php

namespace App\Http\Requests;

use Carbon\Carbon;
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
            'pro_fnac' => 'required',
            'pro_distrito' => 'required',
            'pro_estado' => 'required'
        ];
    }
        
    protected function prepareForValidation()
    {
        $this->merge([
            'pro_fnac' => $this->formatFecha($this->pro_fnac),
        ]);
    }

    protected function formatFecha($pro_fnac)
    {
        return Carbon::createFromFormat('d/m/Y', $pro_fnac)->format('Y-m-d');
    }
}
