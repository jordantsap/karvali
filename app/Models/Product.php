<?php

namespace App\Models;

use Astrotomic\Translatable\Contracts\Translatable as TranslatableContract;
use Astrotomic\Translatable\Translatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model implements TranslatableContract
{

    use Translatable, HasFactory;

    protected $translatedAttributes = [
        'meta_description',
        'meta_keywords',
        'title',
        'slug',
        'description',
    ];
//    public function getRouteKeyName()
//    {
//        return 'slug';
//    }

    protected $fillable = [
        'company_id',
        'user_id',
        'title',
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
        return $this->belongsTo('App\Models\Company', 'company_id');
    }

    public function user()
    {
        return $this->belongsTo('App\Models\User');
    }

    public function category()
    {
        return $this->belongsTo('App\Models\ProductType', 'product_type')->withDefault();
    }

    public function orders()
    {
        return $this->belongsToMany('App\Models\Order');
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

    public function scopeActive($query)
    {
        return $query->where('active', 1);
    }
}
