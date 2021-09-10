<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CategoriaAgregarRequest extends FormRequest
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
            'nombre'=>'required|string|unique:categories',
            'descripcion'=>'required'
        ];
    }

    public function messages(){
        return [
            'nombre.required'=>'El nombre es requerido',
            'nombre.string'=>'El nombre debe ser de tipo texto',
            'nombre.unique'=>'El nombre debe ser unico',
            'descripcion.required'=>'La descripcion requerida'
        ];
    }
}
