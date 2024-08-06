<?php

namespace App\Http\Requests;

use Carbon\Carbon;
use Illuminate\Foundation\Http\FormRequest;

class SaveApoderadoRequest extends FormRequest
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
            'apo_nom' => 'required',
            'apo_app' => 'required',
            'apo_apm' => 'required',
            'apo_dni'=> 'required',
            'apo_telf' => 'nullable',
            'apo_dir' => 'required',
            'apo_fnac' => 'required|date_format:Y-m-d',
            'apo_vinculo' => 'required',
            'apo_grado_inst' => 'nullable',
            'apo_estado' => 'required'
        ];
    }

    protected function prepareForValidation()
    {
        $this->merge([
            'apo_fnac' => $this->formatFecha($this->apo_fnac),
        ]);
    }

    protected function formatFecha($apo_fnac)
    {
        try {            
            return Carbon::parse($apo_fnac)->format('Y-m-d');
        } catch (\Exception $e) {
            return null; 
        }
    }
}
