<?php

namespace App\Http\Requests\Dashboard\Users;

use Illuminate\Foundation\Http\FormRequest;

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
        return $this->user()->can('blog.users.update');
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        switch ($this->section) {
            case 'general':
                $states = cache()->get('states.json');
                $valid_states = $states->pluck('name')->toArray();
                $extra_valid_states = implode(',', $valid_states);

                //valid countries codigo del pais
                $countries = cache()->get('countries.json');
                $valid_countries = $countries->pluck('dial_code')->toArray();
                $extra_valid_countries = implode(',', $valid_countries);

                return [
                    'name' => 'required|string|min:1|max:255',
                    'last_name' => 'required|string|min:1|max:255',
                    'profile_photo' => 'nullable|image|max:2000',
                    'state' => 'required|string|in:' . $extra_valid_states,
                    'countrycode' => 'required|string|in:' . $extra_valid_countries,
                    'birthdate' => 'nullable|date_format:Y-m-d',
                    'gender' => 'required|string|in:male,female',
                    'whatsapp' => 'required|digits:10',
                ];

            case 'personal':
                $user_id = $this->id;

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
                    'whatsapp' => 'nullable|string|regex:'.env('WHATSAPP_PROFILE_REGEX'),
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

                if ($user->hasAnyRole(['advisor'])) {
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
                    $rules['specialization'] = 'required|string|min:10|max:100';
                    $rules['premium'] = 'sometimes|boolean';
                }

                return $rules;

            case 'banking':
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
