<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class GuardarUbicacion extends FormRequest
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
            'nombre_barr' => 'required',
            'direccion' => 'required',
        ];
    }

    public function messages()
    {
        return [
            'nombre_barr.required' => 'El nombre del barrio es obligatorio',
            'direccion.required' => 'La dirección es obligatoria',
        ];
    }
}
