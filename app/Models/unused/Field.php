<?php

namespace App\Models\unused;

use App\Models\Product;
use App\Models\ProductType;
use Astrotomic\Translatable\Contracts\Translatable as TranslatableContract;
use Astrotomic\Translatable\Translatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Field extends Model implements TranslatableContract
{
    use Translatable, HasFactory;

    protected $translatedAttributes = [
        'title',
        'slug',
    ];

    protected $fillable = [
        'product_type_id',
    ];

    public function productType(): BelongsTo
    {
        return $this->belongsTo(ProductType::class);
    }

    public function products(): \Illuminate\Database\Eloquent\Relations\BelongsToMany
    {
        return $this->belongsToMany(Product::class)->withPivot('value');
    }
}
