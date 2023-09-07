<?php

namespace App\Models;

use Astrotomic\Translatable\Contracts\Translatable as TranslatableContract;
use Astrotomic\Translatable\Translatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * @property mixed $venue_id
 * @property mixed $group_id
 */
class Event extends Model implements TranslatableContract
  {
    use Translatable, HasFactory;

    protected $translatedAttributes = [
      'title',
      'slug',
      'manager',
      'meta_description',
      'meta_keywords',
      'description',
    ];
//    public function getRouteKeyName()
//    {
//        return 'slug';
//    }

  protected $fillable = [
     'venue_id',
     'group_id',
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

    public function amenities()
    {
        return $this->morphToMany(Amenity::class, 'amenitable');
    }
    public function group()
    {
        return $this->belongsTo(Group::class);
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
          return $this->morphMany('App\Models\useless\Advert', 'advertable');
      }

    public function images(): \Illuminate\Database\Eloquent\Relations\MorphMany
    {
        return $this->morphMany(Image::class, 'imageable');
    }

    public function scopeActive($query)
    {
        return $query->where('active', 1);
    }
}
