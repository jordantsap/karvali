<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Astrotomic\Translatable\Contracts\Translatable as TranslatableContract;
use Astrotomic\Translatable\Translatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Post extends Model implements TranslatableContract
{
  use Translatable, HasFactory;

//   public function getRouteKeyName()
//   {
//       return 'slug';
//   }

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
      return $this->belongsTo('App\Models\User');
  }


  public function category()
  {
      return $this->belongsTo('App\Models\PostType', 'post_type');
  }


  public function comments()
  {
      return $this->morphMany('App\Models\Comment', 'commentable');
  }


  public function likes()
  {
      return $this->morphMany('App\Models\Like', 'likeable');
  }


  public function scopeActive($query)
  {
    return $query->where('active', 1);
  }

}
