<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Album extends Model
{
  public function getRouteKeyName()
  {
      return 'slug';
  }

  protected $fillable = [
    'cover_image',
    'active',
    'alt',
    'title',
    'meta_description',
    'meta_keywords',
    'slug',
    'description'
  ];

  public function photos()
  {
      return $this->hasMany('App\AlbumPhoto');
  }
}
