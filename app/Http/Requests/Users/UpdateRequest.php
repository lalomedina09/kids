<?php

namespace App\Http\Requests\Users;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

use App\Models\User;

use DB;

class UpdateRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        switch ($this->section) {
            case 'personal':
                return $this->user()->hasProfileRoles();

            case 'payment':
                return $this->user()->hasPaymentRoles();

            default:
                return true;
        }
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        switch ($this->section) {
            case 'password':
                return [
                    'password' => 'required|min:8|max:100|confirmed',
                    'password_confirmation' => 'required|min:8|max:100',
                ];

            case 'profile':
                //jsson's
                $states = cache()->get('states.json');
                $countries = cache()->get('countries.json');

                //valid states
                $valid_states = $states->pluck('name')->toArray();
                $extra_valid_states = implode(',', $valid_states);

                //valid countries codigo del pais
                $valid_countries = $countries->pluck('dial_code')->toArray();
                $extra_valid_countries = implode(',', $valid_countries);

                return [
                    'name' => 'required|string|min:1|max:255',
                    'last_name' => 'required|string|min:1|max:255',
                    'profile_photo' => 'nullable|image|max:2000',
                    'state' => 'required|string|in:' . $extra_valid_states,
                    'countrycode' => 'nullable|string|in:' . $extra_valid_countries,
                    'birthdate' => 'nullable|date_format:Y-m-d',
                    'gender' => 'required|string|in:male,female',
                    'whatsapp' => 'nullable|digits:10'
                ];

            case 'interests':
                $valid_interests = User::getValidInterests()
                    ->pluck('id')
                    ->toArray();
                $extra_valid_interests = implode(',', $valid_interests);

                return [
                    'interests' => 'required|array',
                    'interests.*' => 'integer|exists:categories,id|in:' . $extra_valid_interests
                ];

            case 'personal':
                $user_id = $this->user()->id;

                $rules = [
                    'username' => [
                        'required', 'alpha_dash', 'min:3', 'max:50',
                        Rule::unique('user_metadata', 'value')
                            ->ignore($user_id, 'user_id')
                            ->where(function ($query) {
                                $query->where('scope', 'blog')
                                    ->where('key', 'username');
                            })
                    ],
                    'job' => 'nullable|string|min:1|max:100',
                    'bio' => 'nullable|string|min:10|max:1000',
                    'facebook' => [
                        'active_url', 'url', 'nullable', 'min:10', 'regex:'.env('FACEBOOK_PROFILE_REGEX')
                    ],
                    'twitter' => [
                        'active_url', 'url', 'nullable', 'min:10', 'regex:'.env('TWITTER_PROFILE_REGEX')
                    ],
                    'instagram' => [
                        'active_url', 'url', 'nullable', 'min:10', 'regex:'.env('INSTAGRAM_PROFILE_REGEX')
                    ],
                    'youtube' => [
                        'active_url', 'url', 'nullable', 'min:10', 'regex:'.env('YOUTUBE_PROFILE_REGEX')
                    ]
                ];

                if ($this->user()->hasAnyRole(['advisor'])) {
                    $rules['video'] = 'required|video_url|min:10|max:1000';
                    $rules['education'] = 'required|array';
                    $rules['education.start_date'] = 'required|date_format:Y-m-d';
                    $rules['education.end_date'] = 'required|date_format:Y-m-d';
                    $rules['education.school_name'] = 'required|string|min:1|max:100';
                    $rules['education.degree'] = 'required|string|min:1|max:100';
                    $rules['profession'] = 'required|array';
                    $rules['profession.start_date'] = 'required|date_format:Y-m-d';
                    $rules['profession.end_date'] = 'required|date_format:Y-m-d';
                    $rules['profession.company_name'] = 'required|string|min:1|max:100';
                    $rules['profession.job'] = 'required|string|min:1|max:100';
                    $rules['certifications'] = 'required|string|min:10|max:300';
                }

                return $rules;

            case 'payment':
                $code = $this->input('tax_zipcode');
                $zipcode = DB::table('zipcodes')->where('code', $code)->first();
                $valid_settlements = ($zipcode) ? array_keys(json_decode($zipcode->settlements, 1)) : ['0'];
                $extra_valid_settlements = implode(',', $valid_settlements);

                return [
                    'clabe' => 'required|string|digits:18',
                    'tax_name' => 'required|string',
                    'tax_number' => 'required|string|between:12,13',
                    'tax_address' => 'required|string',
                    'tax_address_number' => 'required|numeric',
                    'tax_zipcode' => 'required|digits:5|exists:zipcodes,code',
                    'tax_settlement' => 'required|numeric|in:' . $extra_valid_settlements
                ];

            default:
                return [];
        }
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
