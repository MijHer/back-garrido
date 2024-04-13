<?php

namespace App\Http\Requests;

use Carbon\Carbon;
use Illuminate\Foundation\Http\FormRequest;

class SaveCursoRequest extends FormRequest
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
            'cur_nom' => 'required',
            'cur_descripcion' => 'nullable',
            'cur_estado' => 'required',
            'cur_registro' => 'required|date'
        ];
    }

    protected function prepareForValidation()
    {
        $this->merge([
            'cur_registro' => $this->formatFecha($this->cur_registro),
        ]);
    }

    protected function formatFecha($cur_registro)
    {
        return Carbon::createFromFormat('d/m/Y', $cur_registro)->format('Y-m-d');
    }
}
