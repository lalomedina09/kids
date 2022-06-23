<?php

namespace App\Http\Requests\Newsletter;

use Illuminate\Foundation\Http\FormRequest;

use App\Models\Newsletter;

class StoreRequest extends FormRequest
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

        return [
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'state' => 'required|string|in:' . $extra_valid_states,
            'g-recaptcha-response' => 'required|recaptcha'
        ];
    }
}
