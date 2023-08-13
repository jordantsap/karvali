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
//    'days',
    'schedule',
//    'opening_times',
//    'closing_times',
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

    public function images(): \Illuminate\Database\Eloquent\Relations\MorphMany
    {
        return $this->morphMany(Image::class, 'imageable');
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
    public function getDaysArray()
    {
        return [
            'mon' => 'Monday',
            'tue' => 'Tuesday',
            'wed' => 'Wednesday',
            'thu' => 'Thursday',
            'fri' => 'Friday',
            'sat' => 'Saturday',
            'sun' => 'Sunday',
        ];
    }

    public function sessions() {
        return $this->belongsToMany(Session::class, 'company_session_day')
            ->withPivot('day_id');
    }
    public function openingHours() {
        return $this->hasMany(CompanyOpeningHours::class);
    }

    protected $casts = [
        'days' => 'array',
        'schedule' => 'array',
    ];

}
