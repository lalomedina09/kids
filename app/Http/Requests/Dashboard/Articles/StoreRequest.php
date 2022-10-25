<?php

namespace App\Http\Requests\Dashboard\Articles;

use Illuminate\Foundation\Http\FormRequest;

use App\Models\Article;

class StoreRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return $this->user()->can('blog.articles.create');
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        $categories = Article::getCategories();
        $valid_categories = $categories->pluck('id')->all();
        $extra_valid_categories = implode(',', $valid_categories);

        return [
            'title' => 'required|string|min:2|max:255',
            'body' => 'required|string',
            'excerpt' => 'required|string|min:1|max:156',
            'author_id' => 'sometimes|integer|exists:users,id',
            'site' => 'required|string',
            //'code_instagram' => 'string',
            'featured_image' => 'sometimes|image',
            'categories' => 'required|array',
            'categories.*' => 'integer|exists:categories,id|in:' . $extra_valid_categories
        ];
    }
}
