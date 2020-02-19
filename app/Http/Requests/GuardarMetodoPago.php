<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

class GuardarMetodoPago extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return Auth::user()->esAdministrador();
    }


    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'nombre_met' => 'required',
            'descuento' => 'required|numeric'
        ];
    }

    public function messages()
    {
        return [
            'nombre_met.required' => 'El nombre del método es obligatorio',
            'descuento.required' => 'El descuento es obligatorio',
            'descuento.numeric' => 'El descuento debe ser un número positivo'
        ];
    }
}
