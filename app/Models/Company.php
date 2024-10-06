<?php

namespace App\Models;

use App\Models\unused\CompanyShift;
use App\Models\unused\Schedule;
use Astrotomic\Translatable\Contracts\Translatable as TranslatableContract;
use Astrotomic\Translatable\Translatable;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

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
    'schedule',
    'openhours',
    'telephone',
    'website',
    'email',
    'facebook',
    'twitter',
    'active',
    'creditcard',
    // 'description',
  ];

    protected $appends = ['is_open_now'];

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
    public function schedules(): \Illuminate\Database\Eloquent\Relations\MorphMany
    {
        return $this->morphMany(Schedule::class, 'scheduleable');
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

    public function scopeActive($query)
    {
        return $query->where('active', 1);
    }

//    public function periods() {
//        return $this->belongsToMany(DayPeriod::class);
//    }

    protected $casts = [
        'days' => 'array',
        'schedule' => 'array',
    ];


    /**
     * Get Shifts of Specified Company
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function shifts() {
        return $this->hasMany(CompanyShift::class, 'company_id');
    }


    /**
     * Check if Company is Open Now or Not
     * @return bool
     */
    public function getIsOpenNowAttribute() {
        $timeNow = Date('H:i:s'); // eg. 22.00.00
        $today = strtolower(Carbon::now()->dayName); // eg. sunday

        $today_shift = $this->shifts()->where('day',$today)
            ->where(function ($q) use ($timeNow) {
                $q->where(function ($q) use ($timeNow) {
                    $q->where('morning_opening_time', '<=', $timeNow)
                        ->where('morning_closing_time', '>=', $timeNow);
                })
                ->orWhere(function ($q) use ($timeNow) {
                    $q->where('afternoon_opening_time', '<=', $timeNow)
                        ->where('afternoon_closing_time', '>=', $timeNow);
                })
                ->orWhere(function ($q) use ($timeNow) {
                    $q->where('evening_opening_time', '<=', $timeNow)
                        ->where('evening_closing_time', '>=', $timeNow);
                });
            })
            ->exists();
        /**
         * If record exist return true otherwise false
         */
        return $today_shift;
    }

}
