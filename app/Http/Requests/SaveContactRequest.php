<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SaveContactRequest extends FormRequest
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
        $addressValidations = '|url';

        if ($this->request->get('type') == 'mail') {
            $addressValidations = '|email';
        } else if ($this->request->get('type') === 'phone') {
            $addressValidations = '|min:10';
        } else if ($this->request->get('type') === 'skype') {
            $addressValidations = '';
        }

        return [
            'name' => 'required|string|min:2|max:255',
            'type' => 'required|in:facebook,google-plus,instagram,linkedin,mail,pinterest,phone,skype,twitter,youtube,globe',
            'address' => 'required|string'.$addressValidations,
            'contactable_id' => 'required|integer',
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
            'name' => 'nombre',
            'type' => 'tipo de contacto',
            'address' => 'dirección de contacto',
        ];
    }
}
