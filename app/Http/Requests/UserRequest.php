<?php

namespace App\Http\Requests;

use App\Http\Requests\CustomRulesRequest;

class UserRequest extends CustomRulesRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return Bool
     */
    public function authorize(): Bool
    {
        return true;
    }

    /**
     * @return Array
     */
    public function validateDefault(): Array
    {
        return [
            // Your default validation
        ];
    }

    /**
     * @return Array
     */
    public function validateToStore(): Array
    {
        return [
            'nameUser' => 'required|min:4|max:50',
            'email'    => 'required|email|min:4|max:60',
            'password' => 'required|min:5|max:255',
        ];

    }

    /**
     * @return Array
     */
    public function validateToUpdate(): Array
    {
        return [
            'nameUser' => 'min:4|max:50',
            'email'    => 'email|min:4|max:60',
            'password' => 'min:5|max:255',
        ];
    }

    /**
     * @return Array
     */
    public function messages(): Array
    {
        return [
            'nameUser.required' => 'O nome de usuario é obrigatio!',
            'nameUser.min'      => 'O nome de usuario deve ter no minimo 4 caracteres!',
            'nameUser.required' => 'O nome de usuario pode ter no maximo 50 caracteres!',

            'email.required' => 'o e-mail é obrigatorio',
            'email.email'    => 'o e-mail deve ser valido',
            'email.min'      => 'O email de usuario deve ter no minimo 4 caracteres!',
            'email.required' => 'O email de usuario pode ter no maximo 60 caracteres!',

            'password.required' => 'A senha de usuario é obrigatio!',
            'password.min'      => 'A senha de usuario deve ter no minimo 5 caracteres!',
            'password.required' => 'A senha de usuario pode ter no maximo 255 caracteres!',
        ];
    }
}
