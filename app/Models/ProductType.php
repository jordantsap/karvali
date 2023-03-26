<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Astrotomic\Translatable\Contracts\Translatable as TranslatableContract;
use Astrotomic\Translatable\Translatable;


class ProductType extends Model implements TranslatableContract
{
  use Translatable;

  protected $fillable = ['name', 'slug'];

  protected array $translatedAttributes = [
    'name',
    'slug',
  ];

  public function getRouteKeyName(): string
  {
      return 'slug';
  }


  public function products(): \Illuminate\Database\Eloquent\Relations\HasMany
  {
    return $this->hasMany('App\Models\Product', 'product_type', 'slug');
  }
}
