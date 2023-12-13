<?php

namespace App\Livewire\Admin\Forms;

use App\Models\Brand;
use Illuminate\Support\Str;
use Livewire\Form;

class BrandForm extends Form
{
    public ?Brand $brand;

    public string $name = '';
    public mixed $image = '';

    public function setBrand(?Brand $brand = null): void
    {
        $this->brand = $brand;
        $this->name = $brand->name;
    }

    public function rules(): array
    {
        $rules = ['name' => 'required'];
        if (empty($this->brand)) {
            $rules['image'] = 'required|image|max:200';
        } else {
            $rules['image'] = 'nullable|image|max:200';
        }

        return $rules;
    }

    public function save(): void
    {
        $this->validate();

        $data = ['slug' => Str::slug($this->name), 'name' => $this->name];
        if (!empty($this->image)) {
            $data['image'] = $this->image->storePublicly('sitorik_brands');
        }

        if (empty($this->brand)) {
            Brand::create($data);
        } else {
            $this->brand->update($data);
        }

        $this->reset();
    }
}
