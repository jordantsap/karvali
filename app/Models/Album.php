<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Album extends Model
{
    use HasFactory;

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
      return $this->hasMany('App\Models\AlbumPhoto');
  }
}
