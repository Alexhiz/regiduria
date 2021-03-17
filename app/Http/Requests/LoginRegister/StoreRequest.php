<?php

namespace App\Http\Requests\LoginRegister;

use Illuminate\Foundation\Http\FormRequest;

class StoreRequest extends FormRequest
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
            'name' => ['required', 'string', 'max:50'],
            'ap_paterno'=>'required',
            'ap_materno'=>'nullable',
            'email' => ['required', 'string', 'email', 'max:100', 'unique:users,email'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ];
    }

    public function messages(){
      return [
        'name.required'=>'El nombre es requerido',
        'name.string'=>'El nombre debe ser de tipo string',
        'name.max'=>'El nombre debe contener como maximo de caracteres 50',
        'ap_paterno.required'=>'El apellido paterno es requerido',
        'email.required'=>'El email es requerido',
        'email.unique'=>'El email ya esta registrado',
        'password.required'=>'La contraseña es requerido',
        'password.min'=>'La contraseña debe tener como minimo 8 caracteres',
      ];
    }
}
