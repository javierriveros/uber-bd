<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class GuardarFactura extends FormRequest
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
            'vehiculo_id' => 'required',
            'metodo_pago_id' => 'required',
            'tarifa_id' => 'required'
        ];
    }

    public function messages()
    {
        return [
            'vehiculo_id.required' => 'Debe seleccionar un vehículo válido',
            'metodo_pago_id.required' => 'Debe seleccionar un método de pago válido',
            'tarifa_id.required' => 'Debe seleccionar una tarifa válida',
        ];
    }
}
