<?php

namespace App\Http\Livewire;

use App\Models\{Attribute, Option, ProductType};
use Livewire\Component;

class CategoryField extends Component
{
    public $productTypes;
    public $attributes;
    public $productType;
    public $attr;
    public array $inputs = [];
    public array $attribute_arr = [];
    public $attribute_values;

    public function mount()
    {
        $this->productTypes = ProductType::withTranslation()->get();
        $this->attributes = collect();
    }
    public function add()
    {
        if(!in_array($this->attr, $this->attribute_arr)){
            array_push($this->inputs, $this->attr);
            array_push($this->attribute_arr, $this->attr);
        }
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
