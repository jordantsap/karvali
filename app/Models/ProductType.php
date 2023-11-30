<?php

namespace App\Models;

use Astrotomic\Translatable\Contracts\Translatable as TranslatableContract;
use Astrotomic\Translatable\Translatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class ProductType extends Model implements TranslatableContract
{
    use Translatable, HasFactory;

//    protected $fillable = ['title', 'slug'];

    protected $translatedAttributes = [
        'title',
        'slug',
    ];

//    public function getRouteKeyName(): string
//    {
//        return 'slug';
//    }

    public function products(): HasMany
    {
        return $this->hasMany('App\Models\Product', 'product_type', 'id');
    }
    public function attributes(): HasMany
    {
        return $this->hasMany(Attribute::class);
    }
}
