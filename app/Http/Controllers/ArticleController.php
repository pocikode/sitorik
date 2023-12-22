<?php

namespace App\Http\Controllers;

use App\Models\Article;
use Illuminate\Contracts\View\View;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class ArticleController
{
    public function index(Request $request): JsonResponse|View
    {
        if ($request->wantsJson()) {
            $articles = Article::with('user', 'trixRichText')
                ->where('is_publish', true)
                ->orderBy('id', 'desc')
                ->paginate(10);

            foreach ($articles as $article) {
                $article->image_url = $article->image ? Storage::url($article->image) : 'https://placehold.co/600x400';
                $article->excerpt = Str::limit(strip_tags($article->trixRichText->first()->content), 150);
                $article->post_date = $article->created_at->isToday() ? 'Hari ini' : indonesian_date($article->created_at);
            }

            return response()->json($articles);
        }

        return view('pages.article.index');
    }

    public function show(string $slug): View
    {
        $article = Article::with('user', 'trixRichText')
            ->where('slug', $slug)
            ->firstOrFail();

        return view('pages.article.show', compact('article'));
    }
}
