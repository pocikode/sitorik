<?php

namespace App\Http\Controllers;

use App\Models\Article;
use Illuminate\Contracts\View\View;

class ArticleController
{
    public function index(): View
    {
        $articles = Article::with('user', 'trixRichText')
            ->where('is_publish', true)
            ->orderBy('id', 'desc')
            ->paginate(10);

        return view('pages.article.index', compact('articles'));
    }

    public function show(string $slug): View
    {
        $article = Article::with('user', 'trixRichText')
            ->where('slug', $slug)
            ->firstOrFail();

        return view('pages.article.show', compact('article'));
    }
}
