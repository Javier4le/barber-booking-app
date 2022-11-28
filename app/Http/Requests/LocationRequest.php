<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class LocationRequest extends FormRequest
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
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'name' => 'max:100',
            'address' => 'required|max:100',
            'phone' => 'required|numeric|digits:9',
        ];
    }

    /**
     * Get the error messages for the defined validation rules.
     *
     * @return array<string, string>
     */
    public function messages()
    {
        return [
            'name.string' => 'El campo de nombre debe ser una cadena de caracteres',
            'name.max' => 'El nombre debe tener como máximo 100 caracteres',

            'address.required' => 'Es necesario ingresar una dirección',
            'address.string' => 'El campo de dirección debe ser una cadena de caracteres',
            'address.max' => 'La dirección debe tener como máximo 100 caracteres',

            'phone.required' => 'Es necesario ingresar un número de teléfono',
            'phone.numeric' => 'El campo de teléfono debe ser numérico',
            'phone.digits' => 'El número de teléfono debe tener 9 dígitos',
        ];
    }
}
