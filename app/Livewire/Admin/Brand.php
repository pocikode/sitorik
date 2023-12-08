<?php

namespace App\Livewire\Admin;

use App\Models\Brand as BrandModel;
use Livewire\Attributes\Validate;
use Livewire\Component;
use Livewire\WithPagination;

class Brand extends Component
{
    use WithPagination;

    public function render()
    {
        return view('livewire.admin.pages.brand', [
            'brands' => BrandModel::paginate(10),
        ]);
    }
}
