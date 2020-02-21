<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;

class GuardarUsuario extends FormRequest
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
            'name' => ['required', 'string', 'max:255', 'alpha'],
            'apellido' => ['required', 'string', 'max:255', 'alpha'],
            'celular' => ['required', 'regex:/(3)[0-9]{9}/', 'min:10', 'max:10'],
            'tipo' => [Rule::in(['1', '2', '3', 1, 2, 3])],
        ];
    }
}
