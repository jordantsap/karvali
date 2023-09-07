<?php

namespace App\Models\unused;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

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
      return $this->hasMany('App\Models\useless\AlbumPhoto');
  }
}
