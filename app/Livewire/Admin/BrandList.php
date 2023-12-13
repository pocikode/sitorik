<?php

namespace App\Livewire\Admin;

use App\Models\Brand as BrandModel;
use Illuminate\Contracts\View\View;
use Livewire\Attributes\Layout;
use Livewire\Attributes\On;
use Livewire\Component;
use Livewire\WithPagination;

#[Layout('layouts.admin')]
class BrandList extends Component
{
    use WithPagination;

    function render(): View
    {
        return view('livewire.admin.pages.brand.list', [
            'brands' => BrandModel::paginate(10),
        ]);
    }

    #[On('refresh-list')]
    public function refreshBrand(): void
    {
        $this->resetPage();
    }
}
