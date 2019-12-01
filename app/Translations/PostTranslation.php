<?php

namespace App\Translations;

use Illuminate\Database\Eloquent\Model;

class PostTranslation extends Model
{
  protected $fillable = [
    'title',
    'meta_description',
    'meta_keywords',
    'slug',
    'description',
  ];

  // public function getRouteKeyName()
  // {
  //     return 'slug';
  // }
}
