<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Astrotomic\Translatable\Contracts\Translatable as TranslatableContract;
use Astrotomic\Translatable\Translatable;

class Company extends Model implements TranslatableContract
  {
    use Translatable;
    
    protected $translatedAttributes = [
      'title',
      'slug',
      'meta_description',
      'meta_keywords',
      'manager',
      'description',
    ];
   // public function getRouteKeyName()
   // {
   //     return 'slug';
   // }

    protected $fillable = [
    'user_id',
    'company_type',
    'delivery',
    'header',
    'logo',
    'image1',
    'image2',
    'image3',
    'days',
    'morningtime',
    'afternoontime',
    'telephone',
    'website',
    'email',
    'facebook',
    'twitter',
    'active',
    'pos',
    'creditcard',
    // 'description',
  ];

    public function user()
    {
        return $this->belongsTo('App\User');
    }


    public function category()
    {
        return $this->belongsTo('App\CompanyType', 'company_type');
    }


    public function products()
    {
        return $this->hasMany('App\Product');
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
