<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

use Astrotomic\Translatable\Contracts\Translatable as TranslatableContract;
use Astrotomic\Translatable\Translatable;

class PostType extends Model implements TranslatableContract
{

  use Translatable;

  protected $fillable = ['title', 'slug'];


  protected $translatedAttributes = [
    'title',
    'slug',
  ];

  public function getRouteKeyName()
  {
      return 'slug';
  }


  public function posts()
  {
      return $this->hasMany('App\Models\Post', 'post_type');
  }
}
