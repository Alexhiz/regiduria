<?php

namespace App\Http\Requests\Condition;

use Illuminate\Foundation\Http\FormRequest;

class AddRequest extends FormRequest
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
            'nombre'=>'required|string|unique:conditions,nombre'.$this->id,
        ];
    }

    public function messages(){
      return [
        'nombre.required'=>'El nombre es requerido',
        'nombre.unique'=>'El nombre ya esta en uso',
        'nombre.string'=>'El nombre debe ser de tipo texto'
      ];
    }
}
