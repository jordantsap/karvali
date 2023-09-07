<?php

namespace App\Http\Livewire;

use App\Models\{Field, Option, ProductType};
use Livewire\Component;

class CategoryField extends Component
{
    public $producttypes;
    public $fields;

    public $producttype;

    public function mount()
    {
        $this->producttypes = ProductType::withTranslation()->get();
        $this->fields = collect();
    }

    public function updatedProducttype($value): void
    {
        $this->fields = Field::where('product_type_id', $value)->get();
    }
    public function render()
    {
        return view('livewire.category-field');
    }
}
