<?php

namespace App\Http\Requests\Dashboard\Courses;

use Illuminate\Foundation\Http\FormRequest;

use App\Models\Course;

class StoreRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return $this->user()->can('blog.courses.create');
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        $categories = Course::getCategories();
        $valid_categories = $categories->pluck('id')->toArray();
        $extra_valid_categories = implode(',', $valid_categories);

        return [
            'title' => 'required|min:2|max:255',
            'subtitle' => 'required|min:2|max:255',
            'body' => 'required|string',
            'excerpt' => 'sometimes|string|min:1|max:156',
            'category_id' => 'required|string|exists:categories,id|in:' . $extra_valid_categories,
            'city' => 'nullable|string|max:255',
            'venue' => 'nullable|string|max:255',
            'address' => 'nullable|string|max:255',
            'featured' => 'nullable|boolean',
            'online_sell' => 'nullable|boolean',
            'start_event' => 'nullable|date',
            'end_event' => 'nullable|date',
            'featured_image' => 'nullable|image',
            'primary_image' => 'nullable|image',
            'thumbnail_image' => 'nullable|image',
            'price' => 'numeric|min:0.0',
            'enrollment_url' => 'nullable|active_url|url|min:10'
        ];
    }

    /**
     * Configure the validator instance.
     *
     * @param  \Illuminate\Validation\Validator  $validator
     * @return void
     */
    public function withValidator($validator)
    {
        $webinar_id_rules = ['required', 'numeric'];
        $validator->sometimes('webinar_id', $webinar_id_rules, function ($input) {
            return $input->online_sell && !$this->enrollment_url;
        });

        $webinar_password_rules = ['required', 'string'];
        $validator->sometimes('webinar_password', $webinar_password_rules, function ($input) {
            return !!$input->webinar_id;
        });
    }

}
