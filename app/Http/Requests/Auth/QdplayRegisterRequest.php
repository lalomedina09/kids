<?php

namespace App\Http\Requests\Auth;

use Illuminate\Foundation\Http\FormRequest;

use App\Models\User;

class QdplayRegisterRequest extends FormRequest
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
            'name' => 'required|string|min:1|max:255',
            'last_name' => 'required|string|min:1|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|min:8|max:100|confirmed',
            'password_confirmation' => 'required|min:8|max:100',
            'source' => 'sometimes|string|min:1|max:255',
            'whatsapp' => 'nullable|min:10',
            'g-recaptcha-response' => 'required|recaptcha'
        ];
    }

    /**
     * Set custom attributes for validator errors.
     *
     * @return array
     */
    public function attributes()
    {
        return [
            #'interests' => 'intereses',
            'last_name' => 'apellidos',
        ];
    }
}
