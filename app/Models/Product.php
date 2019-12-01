<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Astrotomic\Translatable\Contracts\Translatable as TranslatableContract;
use Astrotomic\Translatable\Translatable;

class Product extends Model implements TranslatableContract
  {

    use Translatable;

    protected $translatedAttributes = [
      'meta_description',
      'meta_keywords',
      'title',
      'slug',
      'description',
    ];
    // public function getRouteKeyName()
    // {
    //     return 'slug';
    // }

    protected $fillable = [
    'company_id',
    'user_id',
    'product_type',
    'header',
    'logo',
    'image1',
    'image2',
    'image3',
    'sku',
    'price',
  ];

  public function company()
  {
      return $this->belongsTo('App\Company', 'company_id');
  }

  public function user()
  {
      return $this->belongsTo('App\User');
  }

  public function category()
  {
      return $this->belongsTo('App\ProductType', 'product_type');
  }

  public function orders()
  {
    return $this->belongsToMany('App\Order');
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
