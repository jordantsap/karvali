<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Astrotomic\Translatable\Contracts\Translatable as TranslatableContract;
use Astrotomic\Translatable\Translatable;

class Event extends Model //implements TranslatableContract
  {
    use Translatable;

    protected $translatedAttributes = [
      'title',
      'slug',
      'meta_description',
      'meta_keywords',
      'description',
    ];
    public function getRouteKeyName()
    {
        return 'slug';
    }
  // use Searchable;

  protected $fillable = [
    // 'group_id',
    'user_id',
    'active',
    'header',
    'logo',
    'image1',
    'image2',
    'image3',
    'start_date',
    'start_time',
    'end_date',
    'end_time',
    'entrance',
    'telephone',
    'website',
    'email',
    'facebook',
    'twitter',
    // 'address',
    // 'lat', 'lng',
  ];


  public function group()
  {
      return $this->belongsTo('App\Group');
  }


  public function user()
    {
        return $this->belongsTo('App\User');
    }


  public function comments()
    {
        return $this->morphMany('App\Comment', 'commentable');
    }


  public function likes()
    {
        return $this->morphMany('App\Like', 'likeable');
    }

    public function adverts()
      {
          return $this->morphMany('App\Advert', 'advertable');
      }
}
