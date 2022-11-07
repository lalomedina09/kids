<?php

namespace App\Http\Requests\Dashboard\Articles;

use Illuminate\Foundation\Http\FormRequest;

use App\Models\Article;

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
        $categories = Article::getCategories();
        $valid_categories = $categories->pluck('id')->all();
        $extra_valid_categories = implode(',', $valid_categories);

        $article = Article::findOrFail($this->article_id);
        $tags = $article->getTags();
        $valid_tags = $tags->pluck('id')->all();
        $extra_valid_tags = implode(',', $valid_tags);

        return [
            'title' => 'required|string|min:2|max:255',
            'body' => 'required|string',
            'excerpt' => 'required|string|min:1|max:156',
            'author_id' => 'sometimes|integer|exists:users,id',
            'site' => 'required|string',
            //'code_instagram' => 'string',
            'featured_image' => 'sometimes|image',
            'categories' => 'required|array',
            'categories.*' => 'integer|exists:categories,id|in:' . $extra_valid_categories,
            'tags' => 'required|array',
            'tags.*' => 'integer|exists:categories,id|in:' . $extra_valid_tags
        ];
    }
}
