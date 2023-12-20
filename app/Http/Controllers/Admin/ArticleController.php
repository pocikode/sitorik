<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Article;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class ArticleController extends Controller
{
    public function index(): View
    {
        return view('admin.article.index');
    }

    public function create(): View
    {
        $article = null;
        return view('admin.article.form', compact('article'));
    }

    public function store(Request $request): RedirectResponse
    {
        $data = $request->validate([
            'title' => 'required',
            'article-trixFields' => 'required',
            'attachment-article-trixFields' => 'nullable',
        ]);

        $data['slug'] = Str::slug($data['title']);
        $data['user_id'] = $request->user()->id;

        Article::create($data);

        return redirect()
            ->route('admin.articles')
            ->with('success', 'Article Created Successfully');
    }

    public function edit(Article $article): View
    {
        return view('admin.article.form', compact('article'));
    }

    public function update(Article $article, Request $request): RedirectResponse
    {
        $data = $request->validate([
            'title' => 'required',
            'article-trixFields' => 'required',
            'attachment-article-trixFields' => 'nullable',
        ]);
        $data['slug'] = Str::slug($data['title']);

//        dd($data);

        $article->update($data);
        return redirect()
            ->route('admin.articles')
            ->with('success', 'Article Updated Successfully');
    }
}
