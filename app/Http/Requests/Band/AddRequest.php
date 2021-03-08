<?php

namespace App\Http\Requests\Band;

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

    public function rules()
    {
        return [
            'nombre'=>'required|string',
            'cantidad'=>'required|integer',
            'color'=>'nullable|string',
            'marca'=>'nullable|string',
            'num_serie'=>'nullable|string',
            'observacion'=>'nullable|string',
            'condition_id'=>'required',
            'ubication_id'=>'required',

        ];
    }

    public function messages(){
      return [
        'nombre.required'=>'El nombre es requerido',
        'nombre.string'=>'El nombre debe ser de tipo texto',
        'cantidad.required'=>'La cantidad es requerido',
        'cantidad.integer'=>'La cantidad debe ser de tipo numerico',

        'color.string'=>'El color debe ser de tipo texto',
        'marca.string'=>'El marca debe ser de tipo texto',
        'num_serie.string'=>'El número de serie debe ser de tipo texto',
        'observacion.string'=>'La observacion debe ser de tipo texto',
        
        'condition_id.required'=>'El estado debe ser requerido',
        'ubication_id.required'=>'La ubicación debe ser requerido',
      ];
    }
}
