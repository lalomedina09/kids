<?php

namespace App\Repositories;

use \Illuminate\Http\UploadedFile;

use App\Models\Article;

class ArticleRepository
{
    /**
     * Save article on storage
     *
     * @param  array  $params
     * @param  \App\Models\Article  $article
     * @return \App\Models\Article
     */
    public function save($params, Article $article=null) : Article
    {
        $article = ($article) ?: new Article;

        $article->fill($params);
        $article->save();

        $article->categories()->sync($params['categories']);
        if (array_has($params, 'tags')) {
            $article->saveTags($params['tags']);
        }

        if (array_has($params, 'featured_image')
            && $params['featured_image'] instanceof UploadedFile
            && $file = $params['featured_image']) {
                $article->saveFeaturedImage($file);
        }

        return $article;
    }

}
