<?php

namespace App\Http\Requests;

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
            'apo_dni'=> 'required|max:8',
            'apo_telf' => 'nullable',
            'apo_dir' => 'required',
            'apo_fnac' => 'required',
            'apo_vinculo' => 'required',
            'apo_grado_inst' => 'nullable'            
        ];
    }
}
