<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Astrotomic\Translatable\Contracts\Translatable as TranslatableContract;
use Astrotomic\Translatable\Translatable;

class Group extends Model implements TranslatableContract
  {
    use Translatable;
    protected $translatedAttributes = [
      'title',
      'slug',
      'meta_description',
      'meta_keywords',
      'description',
      'manager',
    ];

  public function getRouteKeyName()
    {
        return 'slug';
    }

    protected $fillable = [
      'user_id',
      'active',
      'group_type',
      'header',
      'logo',
      'image1',
      'image2',
      'image3',
      'telephone',
      'website',
      'email',
      'facebook',
      'twitter',
      // 'address',
      // 'lat', 'lng',
    ];

    public function user()
    {
        return $this->belongsTo('App\User');
    }

    public function event()
    {
        return $this->hasOne('App\Event');
    }

    public function category()
    {
        return $this->belongsTo('App\GroupType', 'group_type');
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

    public function scopeActive($query)
    {
        return $query->where('active', 1);
    }
}
