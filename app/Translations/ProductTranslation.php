<?php

namespace App\Translations;

use Illuminate\Database\Eloquent\Model;

class ProductTranslation extends Model
{
  protected $fillable = [
    'meta_description',
    'meta_keywords',
    'title',
    'slug',
    'header',
    'description',
  ];

  // public function getRouteKeyName()
  // {
  //     return 'slug';
  // }
}
