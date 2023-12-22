<?php

namespace App\Livewire\Home;

use App\Models\Motorcycle;
use Livewire\Component;

class LatestModel extends Component
{
    private function getData(): \Illuminate\Database\Eloquent\Collection
    {
        return Motorcycle::with('brand', 'specification', 'picture')
            ->orderBy('id', 'desc')
            ->limit(4)
            ->get();
    }

    public function render()
    {
        return view('livewire.pages.home.latest-model', [
            'motorcycles' => $this->getData(),
        ]);
    }
}
