<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Astrotomic\Translatable\Contracts\Translatable as TranslatableContract;
use Astrotomic\Translatable\Translatable;


class ProductType extends Model //implements TranslatableContract
{
  use Translatable;

  protected $fillable = ['name', 'slug'];

  protected $translatedAttributes = [
    'name',
    'slug',
  ];

  public function getRouteKeyName()
  {
      return 'slug';
  }


  public function products()
  {
    return $this->hasMany('App\Product', 'product_type');
  }
}
