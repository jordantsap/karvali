<?php

namespace App\Http\Livewire;

use App\Models\{Attribute, Option, ProductType, unused\Field};
use Livewire\Component;

class CategoryField extends Component
{
    public $productTypes;
    public $attributes;

    public $productType;

    public function mount()
    {
        $this->productTypes = ProductType::withTranslation()->get();
        $this->attributes = collect();
    }

    public function updatedProductType($value)
    {
        $this->attributes = Attribute::where('product_type_id', $value)->get();
    }
    public function render()
    {
        return view('livewire.category-field');
    }
}
