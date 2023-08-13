<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Astrotomic\Translatable\Contracts\Translatable as TranslatableContract;
use Astrotomic\Translatable\Translatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Event extends Model implements TranslatableContract
  {
    use Translatable, HasFactory;

    protected $translatedAttributes = [
      'title',
      'slug',
      'meta_description',
      'meta_keywords',
      'description',
    ];
//    public function getRouteKeyName()
//    {
//        return 'slug';
//    }

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

    public function venue()
    {
        return $this->belongsTo(Venue::class);
    }

    public function user()
    {
        return $this->belongsTo('App\Models\User');
    }

  public function comments()
    {
        return $this->morphMany('App\Models\Comment', 'commentable');
    }


  public function likes()
    {
        return $this->morphMany('App\Models\Like', 'likeable');
    }

    public function adverts()
      {
          return $this->morphMany('App\Models\Advert', 'advertable');
      }

    public function scopeActive($query)
    {
        return $query->where('active', 1);
    }
}
