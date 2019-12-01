<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Astrotomic\Translatable\Contracts\Translatable as TranslatableContract;
use Astrotomic\Translatable\Translatable;

class Comment extends Model implements TranslatableContract
{
  use Translatable;

  protected $translatedAttributes = ['comment'];

  protected $fillable = [
    'comment',
    'commentable_id',
    'commentable_type',
    'user_id',
  ];

  
  public function commentable()
  {
      return $this->morphTo();
  }
}
