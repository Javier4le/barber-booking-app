<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ServiceRequest extends FormRequest
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
            'name' => 'required|string|max:100',
            'price' => 'required|numeric|min:0',
            'duration' => 'required|numeric|min:5',
            'description' => 'required|string|max:255',
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
            'name.required' => 'Es necesario ingresar un nombre',
            'name.string' => 'El nombre debe ser una cadena de caracteres',
            'name.max' => 'El nombre debe tener como máximo 100 caracteres',

            'price.required' => 'Es necesario ingresar un precio',
            'price.numeric' => 'El precio debe ser un número',
            'price.min' => 'El precio debe ser mayor o igual a 0',

            'duration.required' => 'Es necesario ingresar una duración',
            'duration.numeric' => 'La duración debe ser un número',
            'duration.min' => 'La duración debe ser mayor o igual a 5',

            'description.required' => 'Es necesario ingresar una descripción',
            'description.string' => 'La descripción debe ser una cadena de caracteres',
            'description.max' => 'La descripción debe tener como máximo 255 caracteres',
        ];
    }
}
