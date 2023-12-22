<?php

namespace App\Livewire\Partials;

use App\Models\Motorcycle;
use Livewire\Component;

class LatestModelSidebar extends Component
{
    private function getData(): \Illuminate\Database\Eloquent\Collection
    {
        return Motorcycle::with('brand', 'picture')
            ->orderBy('id', 'desc')
            ->limit(5)
            ->get();
    }

    public function render()
    {
        return view('livewire.partials.latest-model-sidebar', [
            'motorcycles' => $this->getData(),
        ]);
    }
}
