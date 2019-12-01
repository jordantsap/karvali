<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Astrotomic\Translatable\Contracts\Translatable as TranslatableContract;
use Astrotomic\Translatable\Translatable;

class Post extends Model implements TranslatableContract
{
  use Translatable;

  // public function getRouteKeyName()
  // {
  //     return 'slug';
  // }

  protected $translatedAttributes = [
    'title',
    'meta_description',
    'meta_keywords',
    'slug',
    'description',
  ];

  protected $fillable = [
    'active',
    'user_id',
    'post_type',
    'image',
  ];

  public function user()
  {
      return $this->belongsTo('App\User');
  }


  public function category()
  {
      return $this->belongsTo('App\PostType', 'post_type');
  }


  public function comments()
  {
      return $this->morphMany('App\Comment', 'commentable');
  }


  public function likes()
  {
      return $this->morphMany('App\Like', 'likeable');
  }


  public function scopeActive($query)
  {
    return $query->where('active', 1);
  }

}
