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
            'image' => ['required', 'image'],
            'article-trixFields' => 'required',
            'attachment-article-trixFields' => 'nullable',
            'publish' => 'required',
        ]);

        $data['image'] = $request->file('image')->storePublicly('articles');
        $data['slug'] = Str::slug($data['title']);
        $data['user_id'] = $request->user()->id;
        $data['is_publish'] = $data['publish'] === 'Submit';

        unset($data['publish']);
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
            'image' => ['image'],
            'article-trixFields' => 'required',
            'attachment-article-trixFields' => 'nullable',
            'publish' => 'required',
        ]);
        $data['slug'] = Str::slug($data['title']);
        $data['is_publish'] = $data['publish'] === 'Submit';

        if ($request->hasFile('image')) {
            $data['image'] = $request->file('image')->storePublicly('articles');
        }

        unset($data['publish']);
        $article->update($data);

        return redirect()
            ->route('admin.articles')
            ->with('success', 'Article Updated Successfully');
    }
}
