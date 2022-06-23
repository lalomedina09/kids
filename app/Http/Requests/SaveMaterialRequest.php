<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SaveMaterialRequest extends FormRequest
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
        $filename = storage_path('app/json/course_extras.json');
        $contents = file_get_contents($filename);
        $course_extras = json_decode($contents);
        $course_extras_keys = array_pluck($course_extras, 'value');
        $valid_course_extras = implode(',', $course_extras_keys);
        return [
            'name' => 'required|min:2|max:255',
            'course_id' => 'required|integer|exists:courses,id',
            'type' => 'required|in:' . $valid_course_extras,
        ];
    }
}
