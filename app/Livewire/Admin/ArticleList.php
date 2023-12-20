<?php

namespace App\Livewire\Admin;

use App\Models\Article;
use Illuminate\Contracts\View\View;
use Livewire\Component;
use Livewire\WithPagination;

class ArticleList extends Component
{
    use WithPagination;

    public function render(): View
    {
        $articles = Article::with('user')->paginate(10);
        return view('livewire.admin.pages.article-lists', compact('articles'));
    }
}
