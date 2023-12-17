<?php

namespace App\Livewire\Admin;

use Illuminate\Contracts\View\View;
use LivewireUI\Modal\ModalComponent;

class BrandDelete extends ModalComponent
{
    public \App\Models\Brand $brand;

    public function mount(\App\Models\Brand $brand): void
    {
        $this->brand = $brand;
    }

    public function delete(): void
    {
        $this->brand->delete();
        $this->closeModal();
        $this->dispatch('refresh-list');
    }

    public function render(): View
    {
        return view('livewire.admin.pages.brand.delete');
    }

    public static function modalMaxWidthClass(): string
    {
        return 'w-full max-w-xl';
    }
}
