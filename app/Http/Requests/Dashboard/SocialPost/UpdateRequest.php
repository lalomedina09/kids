<?php

namespace App\Http\Requests\Dashboard\SocialPost;

use Illuminate\Foundation\Http\FormRequest;

use App\Models\SocialPost;

class UpdateRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return $this->user()->can('blog.articles.update');
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {

        return [
            'red_social' => 'required|string|min:2|max:255',
            'type' => 'required|string',
            'code' => 'required|string|min:2|max:255',
            'site' => 'required|string|min:2|max:255',
            'description' => 'required|string|min:2|max:255'
        ];
    }
}
