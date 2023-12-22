<?php

namespace App\Livewire\Partials;

use App\Models\Article;
use Illuminate\Contracts\View\View;
use Livewire\Component;

class LatestArticleSidebar extends Component
{
    protected function getData(): \Illuminate\Database\Eloquent\Collection
    {
        return Article::with('user')
            ->where('is_publish', true)
            ->orderBy('id', 'desc')
            ->limit(5)
            ->get();
    }

    public function render():View
    {
        return view('livewire.partials.latest-article-sidebar', [
            'articles' => $this->getData(),
        ]);
    }
}
