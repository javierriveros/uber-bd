<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

class ActualizarVehiculo extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return Auth::user()->esAdministrador() || Auth::user()->esConductor();
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'placa' => ['required', 'regex:/[A-Z]{3}-[0-9]{3}/'],
            'modelo' => 'required|numeric',
            'color' => 'required'
        ];
    }

    public function messages()
    {
        return [
            'placa.regex' => 'La placa debe tener el patrón ABC-123'
        ];
    }
}
