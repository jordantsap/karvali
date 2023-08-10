<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Model;
use Astrotomic\Translatable\Contracts\Translatable as TranslatableContract;
use Astrotomic\Translatable\Translatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Company extends Model implements TranslatableContract
  {
    use Translatable, HasFactory;

    protected $translatedAttributes = [
      'title',
      'slug',
      'meta_description',
      'meta_keywords',
      'manager',
      'description',
    ];
//    public function getRouteKeyName(): string
//    {
//        return 'slug';
//    }

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
    'opening_times',
    'closing_times',
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
        return $this->belongsTo('App\Models\User');
    }


    public function category()
    {
        return $this->belongsTo('App\Models\CompanyType', 'company_type');
    }


    public function products()
    {
        return $this->hasMany('App\Models\Product');
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
    public function getWeekDaysAttribute()
    {
        return ['Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday', 'Sunday'];
    }

}
