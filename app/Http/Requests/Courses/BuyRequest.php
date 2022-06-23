<?php

namespace App\Http\Requests\Courses;

use Illuminate\Foundation\Http\FormRequest;

class BuyRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return auth()->check();
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        $valid_payment_methods = array_values(config('money.modules.marketplace.payment'));
        $extra_valid_payment_methods = implode(',', $valid_payment_methods);

        return [
            'payment' => "required|string|in:{$extra_valid_payment_methods}",
            'politics' => 'required'
        ];
    }

}
