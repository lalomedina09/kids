<?php

namespace App\Http\Requests\Dashboard\Videos;

use Illuminate\Foundation\Http\FormRequest;

use App\Models\Video;

class StoreRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return $this->user()->can('blog.videos.create');
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        $categories = Video::getCategories();
        $valid_categories = $categories->pluck('id')->all();
        $extra_valid_categories = implode(',', $valid_categories);

        return [
            'title' => 'required|min:2|max:255',
            'url' => 'required|url',
            'body' => 'required|string',
            'excerpt' => 'sometimes|string|min:1|max:156',
            'author_id' => 'sometimes|integer|exists:users,id',
            'featured_image' => 'sometimes|image',
            'categories' => 'required|array',
            'categories.*' => 'integer|exists:categories,id|in:' . $extra_valid_categories
        ];
    }
}
