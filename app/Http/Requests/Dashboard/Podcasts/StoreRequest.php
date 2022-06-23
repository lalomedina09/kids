<?php

namespace App\Http\Requests\Dashboard\Podcasts;

use Illuminate\Foundation\Http\FormRequest;

use App\Models\Podcast;

class StoreRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return $this->user()->can('blog.podcasts.create');
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        $categories = Podcast::getCategories();
        $valid_categories = $categories->pluck('id')->all();
        $extra_valid_categories = implode(',', $valid_categories);

        return [
            'title' => 'required|min:2|max:255',
            'body' => 'required|string',
            'excerpt' => 'sometimes|string|min:1|max:156',
            'featured_image' => 'sometimes|image',
            'audio_file' => 'sometimes|mimes:mp3,mpga,ogg',
            'url' => 'nullable|string|url',
            'author_id' => 'sometimes|integer|exists:users,id',
            'categories' => 'required|array',
            'categories.' => 'integer|exists:categories,id|in:' . $extra_valid_categories
        ];
    }

    /**
     * Set custom attributes for validator errors.
     *
     * @return array
     */
    public function attributes()
    {
        return [
            'audio_file' => 'audio podcast',
        ];
    }
}
