<?php

namespace App\Livewire\Home;

use App\Models\Article;
use Illuminate\Contracts\View\View;
use Livewire\Component;

class LatestArticle extends Component
{
    private function getData(): \Illuminate\Database\Eloquent\Collection
    {
        return Article::with('trixRichText', 'user')
            ->where('is_publish', true)
            ->orderBy('id', 'desc')
            ->limit(3)
            ->get();
    }

    public function render():View
    {
        return view('livewire.pages.home.latest-article', [
            'articles' => $this->getData(),
        ]);
    }
}
