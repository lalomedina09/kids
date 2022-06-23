<?php

namespace App\Http\Requests\Dashboard\Users;

use Illuminate\Foundation\Http\FormRequest;

class StoreRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return $this->user()->can('blog.users.create');
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

        return [
            'name' => 'required|string|min:1|max:255',
            'last_name' => 'required|string|min:1|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|min:8|max:100|confirmed',
            'password_confirmation' => 'required|min:8|max:100',
            'state' => 'required|string|in:' . $extra_valid_states,
            'birthdate' => 'nullable|date_format:Y-m-d',
            'gender' => 'required|string|in:male,female',
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
            'last_name' => 'apellidos',
        ];
    }
}
