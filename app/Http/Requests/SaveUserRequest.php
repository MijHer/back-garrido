<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SaveUserRequest extends FormRequest
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
            'name' => 'required',
            'usu_dni' => 'required|max:8|unique:users',
            'email' => 'nullable|email',
            'email_verified_at' => 'nullable|email',
            'usu_user' => 'required',
            'password' => 'required|min:4',
            'usu_dir' => 'required',
            'usu_telf' => 'required|max:9',
            'profesor_id' => 'required',
            'tipousuario_id' => 'required',
            'alumno_id' => 'required'
        ];
    }
}
