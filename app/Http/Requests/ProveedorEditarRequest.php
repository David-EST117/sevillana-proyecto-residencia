<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProveedorEditarRequest extends FormRequest
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
            'nombre'=>'required|string',
            'descripcion'=>'required',
            'tipo'=>'required'
        ];
    }

    public function messages(){
        return [
            'nombre.required'=>'El nombre es requerido',
            'nombre.string'=>'El nombre debe ser de tipo texto',
            'descripcion.required'=>'La descripcion requerida',
            'tipo.required'=>'El tipo es requerido'
        ];
    }
}
