<?php

namespace App\Http\Requests\Auth;

use Illuminate\Foundation\Http\FormRequest;

use App\Models\User;

class RegisterExhibitorRequest extends FormRequest
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
        $states = cache()->get('states.json');
        $valid_states = $states->pluck('name')->toArray();
        $extra_valid_states = implode(',', $valid_states);

        $interests = User::getValidInterests();
        $valid_interests = $interests->pluck('id')->toArray();
        $extra_valid_interests = implode(',', $valid_interests);

        //valid countries codigo del pais
        $countries = cache()->get('countries.json');
        $valid_countries = $countries->pluck('dial_code')->toArray();
        $extra_valid_countries = implode(',', $valid_countries);

        return [
            'name' => 'required|string|min:1|max:255',
            'last_name' => 'required|string|min:1|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|min:8|max:100|confirmed',
            'password_confirmation' => 'required|min:8|max:100',
            'state' => 'required|string|in:' . $extra_valid_states,
            'countrycode' => 'nullable|string|in:' . $extra_valid_countries,
            'birthdate' => 'nullable|date_format:Y-m-d',
            'gender' => 'required|string|in:male,female',
            'whatsapp' => 'nullable|digits:10',
            'profile_photo' => 'required',
            'service_contract' => 'required'
            #'interests' => 'sometimes|array',
            #'interests.*' => 'integer|exists:categories,id|in:' . $extra_valid_interests,
            //'g-recaptcha-response' => 'required|recaptcha'
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
            'interests' => 'intereses',
            'last_name' => 'apellidos',
        ];
    }
}
