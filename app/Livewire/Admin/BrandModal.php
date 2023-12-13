<?php

namespace App\Livewire\Admin;

use Illuminate\Contracts\View\View;
use Livewire\WithFileUploads;
use LivewireUI\Modal\ModalComponent;

class BrandModal extends ModalComponent
{
    use WithFileUploads;

    public ?\App\Models\Brand $brand;
    public Forms\BrandForm $form;

    public function mount(\App\Models\Brand $brand = null): void
    {
        if ($brand->exists) {
            $this->form->setBrand($brand);
        }
    }

    public function save(): void
    {
        $this->form->save();
        $this->closeModal();
        $this->dispatch('refresh-list');
    }

    public function render(): View
    {
        return view('livewire.admin.pages.brand.modal');
    }

    public static function modalMaxWidthClass(): string
    {
        return 'w-full max-w-2xl';
    }
}
