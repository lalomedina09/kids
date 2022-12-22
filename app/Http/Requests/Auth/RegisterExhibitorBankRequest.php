<?php

namespace App\Http\Requests\Auth;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;
use DB;

class RegisterExhibitorBankRequest extends FormRequest
{

    public function rules()
    {
        $code = $this->input('tax_zipcode');
        $zipcode = DB::table('zipcodes')->where('code', $code)->first();
        $valid_settlements = ($zipcode) ? array_keys(json_decode($zipcode->settlements, 1)) : ['0'];
        $extra_valid_settlements = implode(',', $valid_settlements);

        return [
            'account' => 'required',
            'name_bank' => 'required',
            'clabe' => 'required|string|digits:18',
            'tax_name' => 'required|string',
            'profile_file_tax' => 'required',
            'tax_number' => 'required|string|between:12,13',
            'tax_address' => 'required|string',
            'tax_address_number' => 'required|numeric',
            'tax_zipcode' => 'required|digits:5|exists:zipcodes,code',
            'tax_settlement' => 'required|numeric|in:' . $extra_valid_settlements
        ];

    }
}
