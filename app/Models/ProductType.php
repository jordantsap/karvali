<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Astrotomic\Translatable\Contracts\Translatable as TranslatableContract;
use Astrotomic\Translatable\Translatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class ProductType extends Model implements TranslatableContract
{
  use Translatable, HasFactory;

  protected $fillable = ['name', 'slug'];

  protected $translatedAttributes = [
    'name',
    'slug',
  ];

  public function getRouteKeyName(): string
  {
      return 'slug';
  }


  public function products(): \Illuminate\Database\Eloquent\Relations\HasMany
  {
    return $this->hasMany('App\Models\Product', 'product_type', 'id');
  }
}
