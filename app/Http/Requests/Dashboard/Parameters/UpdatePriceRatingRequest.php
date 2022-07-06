<?php

namespace App\Http\Requests\Dashboard\Parameters;

use Illuminate\Foundation\Http\FormRequest;

class UpdatePriceRatingRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return $this->user()->can('parametetrs.prices.rating');
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            '_lft' => 'required|integer',
            '_rgt' => 'required|integer'
        ];
    }
}
