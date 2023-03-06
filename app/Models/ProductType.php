<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Astrotomic\Translatable\Translatable;


class ProductType extends Model implements \Astrotomic\Translatable\Contracts\Translatable
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
    return $this->hasMany('App\Models\Product');
  }
}
