<?php

namespace App\Http\Requests\User;

use Illuminate\Foundation\Http\FormRequest;

class UserStoreRequest extends FormRequest
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
            'first_name' => 'required|string|min:3|max:255',
            'last_name' => 'nullable|string|min:3|max:255',
            // 'phone' => 'required|numeric|regex:/\+569[0-9]{8}/',
            'phone' => 'nullable|string|min:9|max:13',
            'username' => 'required|string|min:3|max:255|unique:users,username',
            'email' => 'required|string|email|max:255|unique:users,email',
            'password' => 'required|string|min:8',
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
            'first_name.required' => 'Es necesario ingresar un nombre',
            'first_name.string' => 'El campo de nombre debe ser una cadena de caracteres',
            'first_name.min' => 'El nombre debe tener como mínimo 3 caracteres',
            'first_name.max' => 'El nombre debe tener como máximo 255 caracteres',

            'last_name.string' => 'El campo de apellido debe ser una cadena de caracteres',
            'last_name.min' => 'El apellido debe tener como mínimo 3 caracteres',
            'last_name.max' => 'El apellido debe tener como máximo 255 caracteres',

            'phone.required' => 'Es necesario ingresar un número de teléfono',
            'phone.numeric' => 'El campo de teléfono debe ser numérico',
            // 'phone.regex' => 'El número de teléfono debe tener el formato +569XXXXXXXX, con sus 9 dígitos',
            'phone.min' => 'El número de teléfono debe tener como mínimo 9 caracteres',
            'phone.max' => 'El número de teléfono debe tener como máximo 13 caracteres',

            'username.required' => 'Es necesario ingresar un nombre de usuario',
            'username.string' => 'El campo de nombre de usuario debe ser una cadena de caracteres',
            'username.min' => 'El nombre de usuario debe tener como mínimo 3 caracteres',
            'username.max' => 'El nombre de usuario debe tener como máximo 255 caracteres',
            'username.unique' => 'El nombre de usuario ya está en uso',

            'email.required' => 'Es necesario ingresar un correo electrónico',
            'email.string' => 'El campo de correo electrónico debe ser una cadena de caracteres',
            'email.email' => 'El correo electrónico debe tener el formato XXXX@XXX.XXX',
            'email.max' => 'El correo electrónico debe tener como máximo 255 caracteres',
            'email.unique' => 'El correo electrónico ya está en uso',

            'password.required' => 'Es necesario ingresar una contraseña',
            'password.string' => 'El campo de contraseña debe ser una cadena de caracteres',
            'password.min' => 'La contraseña debe tener como mínimo 8 caracteres',
        ];
    }
}
