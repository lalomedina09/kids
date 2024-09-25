<?php

namespace App\Http\Requests\Dashboard\Articles;

use Illuminate\Foundation\Http\FormRequest;

class AdvertisingRequest extends FormRequest
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
        return [
            'id' => 'sometimes|nullable|int|min:1',
            'article_id' => 'sometimes|nullable|int|min:1',
            'updated_by' => 'sometimes|nullable|int|min:1',
            'cover_desktop' => 'sometimes|file|image|max:1000',
            'cover_movil' => 'sometimes|file|image|max:1000',
            'published_at' => 'sometimes|nullable|date',
            'published_at_expired' => 'sometimes|nullable|date',
        ];
    }
}
