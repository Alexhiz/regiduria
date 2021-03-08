<?php

namespace App\Http\Requests\Lockerroom;

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
            'material'=>'nullable|string',
            'talla'=>'nullable|string',
            'observacion'=>'nullable|string',
            'unit_id'=>'required',
            'region_id'=>'required',
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
        'material.string'=>'El tamano debe ser de tipo texto',
        'talla.string'=>'El marca debe ser de tipo texto',
        
        'observacion.string'=>'La observacion debe ser de tipo texto',
        
        'unit_id.required'=>'La unidad debe ser requerido',
        'region_id.required'=>'La región debe ser requerido',
        'condition_id.required'=>'El estado debe ser requerido',
        'ubication_id.required'=>'La ubicación debe ser requerido',
      ];
    }
}
