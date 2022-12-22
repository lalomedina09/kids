<?php

namespace App\Http\Requests\Auth;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;
use DB;

class RegisterExhibitorProfileRequest extends FormRequest
{

    public function rules()
    {
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
                    'whatsapp' => 'nullable|string|regex:' . env('WHATSAPP_PROFILE_REGEX'),
                    'facebook' => [
                        'active_url', 'url', 'nullable', 'min:10', 'regex:' . env('FACEBOOK_PROFILE_REGEX')
                    ],
                    'twitter' => [
                        'active_url', 'url', 'nullable', 'min:10', 'regex:' . env('TWITTER_PROFILE_REGEX')
                    ],
                    'instagram' => [
                        'active_url', 'url', 'nullable', 'min:10', 'regex:' . env('INSTAGRAM_PROFILE_REGEX')
                    ],
                    'tiktok' => [
                        'active_url', 'url', 'nullable', 'min:10', 'regex:' . env('TIKTOK_PROFILE_REGEX')
                    ],
                    'linkedin' => [
                        'active_url', 'url', 'nullable', 'min:10'
                    ],
                    'youtube' => [
                        'active_url', 'url', 'nullable', 'min:10', 'regex:' . env('YOUTUBE_PROFILE_REGEX')
                    ]
                ];

                //$rules['video'] = 'required|video_url|min:10|max:1000';
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

                return $rules;
    }

}
