<?php

namespace App\Livewire\Admin;

use App\Models\Brand;
use App\Models\Motorcycle;
use Livewire\Component;
use Livewire\WithPagination;

class MotorcycleLists extends Component
{
    use WithPagination;

    public function render()
    {
        $brands = Brand::query()->select('id', 'name')->get()->all();
        $motorcycles = Motorcycle::with('brand', 'specification', 'picture')->paginate(10);

        return view('livewire.admin.pages.motorcycle-lists', [
            'brands' => $brands,
            'motorcycles' => $motorcycles,
        ]);
    }
}
