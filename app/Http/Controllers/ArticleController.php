<?php

namespace App\Http\Controllers;

use App\Models\Article;
use Illuminate\Contracts\View\View;

class ArticleController
{
    public function show(string $slug): View
    {
        $article = Article::with('user', 'trixRichText')
            ->where('slug', $slug)
            ->firstOrFail();

        return view('pages.article.show', compact('article'));
    }
}
