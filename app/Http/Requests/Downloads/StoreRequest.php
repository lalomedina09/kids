<?php

namespace App\Http\Requests\Downloads;

use Illuminate\Foundation\Http\FormRequest;

use App\Models\Download;

class StoreRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return $this->user()->can('blog.downloads.create');
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name' => 'required|min:1|max:255',
            'description' => 'required|min:1|max:1000',
            'payload' => 'required|mimetypes:' . implode(',', array_keys(Download::$mimes))
        ];
    }
}
