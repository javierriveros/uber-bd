<?php

namespace App\Http\Requests;

use Illuminate\Support\Facades\Auth;
use Illuminate\Foundation\Http\FormRequest;

class GuardarTarifa extends FormRequest
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
            'valor' => 'required|numeric',
            'origen_id' => 'required|numeric',
            'destino_id'  => 'required|numeric',
        ];
    }

    public function messages()
    {
        return [
            'origen_id.required' => 'El origen obligatorio',
            'destino_id.required' => 'El destino es obligatorio',
            'valor.required' => 'El valor es obligatorio'
        ];
    }
}
